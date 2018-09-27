<?php
namespace App\Http\Controllers\Admin;
use App\Models\Appointment;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Auth\Role\Role;
use DB;
use PdfReport;
use Validator;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $key = $request->input('key');
        // $appointments = Appointment::all();
        $appointments = Appointment::latest()->search($key)->paginate(20);
        return view('admin.appointments.index', compact('appointments', 'key'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.appointments.add');
    }

    public function checkDate(Request $request)
    {
        //check for duplicate
        $count = DB::table('appointments')->where('date', $request->date)->count();
        $allocateValidateMessage ='This day('.$request->date.') do not have available time slots to allocate, 
        please allocate another day! ';
        Validator::extend('checkDateSlot', function ($attribute, $value, $parameters, $validator) {
            return $parameters[0] !== "13";
        }, $allocateValidateMessage);

        $validatedData = [
            'date' => "required|date_format:Y-m-d|after:today|checkDateSlot:{$count}",
        ];

        $customMessages = [
            'date.after' => 'Appointment Date can not be today, tomorrow onward',
        ];

        $this->validate($request, $validatedData, $customMessages);

        $appointments = Appointment::where('date', $request->date)->pluck('time');
        return view('admin.appointments.add')->with(['message' => 13 - $count . 'time slots are available.', 'appointments' => $appointments]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = [
            'name' => 'required|regex:/^[a-zA-Z0-9 ]+$/u|max:255',
            'type' => 'required',
            'date' => 'required|date_format:Y-m-d|after:today',
            'time' => 'required',
        ];

        $customMessages = [
            'name.regex' => 'Name cannot contain numbers and special characters',
            'date.after' => 'Appointment Date can not be today, tomorrow onward',
            'time.after' => 'Appointment Time cannot be now or past'
        ];
        $this->validate($request, $validatedData, $customMessages);

        if(\Auth::check()) {
        
            Appointment::create($request->all());
            
            //add notification to display on employees
            Notification::create([
                'user_type' => \Auth::user()->usertype,
                'user_id' => \Auth::user()->id,
                'appointment_id' => Appointment::latest()->first()->id,
                'message' => 'Appointment is requested by ' . \Auth::user()->name,
                'header' => 'New appointment Request',
                'status' => 'unread',
                'action' => 'pending',
                'date' => Carbon::now()->format('Y.m.d'),
                'time' => Carbon::now()->format('H.i')
            ]);
        }

        return redirect()->route('admin.appointments')->with('message', 'Appointment added successfully!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        return view('admin.appointments.show', ['appointment' => $appointment]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        return view('admin.appointments.edit', ['appointment' => $appointment, 'roles' => Role::get()]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        
        $validatedData = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'date' => 'required',
            'time' => 'required'
        ]);
        $appointment->name = $request->get('name');
        $appointment->type = $request->get('type');
        $appointment->date = $request->get('date');
        $appointment->time = $request->get('time');
        $appointment->save();
        $message = 'Successfully updated appointment named '.$appointment->name.' with id '.$appointment->id;
        return redirect()->intended(route('admin.appointments'))->with('message', $message);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        $message = 'Successfully deleted appointment named '.$appointment->name.' with id '.$appointment->id;
        
        if(\Auth::check()) {
            $notif = Notification::where('appointment_id','=', $appointment->id);
            $notif->delete();
        }

        $appointment->delete();
        return redirect()->route('admin.appointments')->with('message', $message);
    }

    public function gotoReport() {
        return view('admin.appointments.report');
    }

    public function generateReport(Request $request)
    {
        $fromDate = $request->input('created_date');
        $toDate = $request->input('to_date');
        $sortBy = $request->input('sort_by');

        $title = 'Generated Report of Appointments'; // Report title

        $meta = [ // For displaying filters description on header
            'Between ' => $fromDate . ' to ' . $toDate,
            'Sort By' => $sortBy
        ];

        $queryBuilder = Appointment::select(['id', 'name', 'date', 'time', 'type', 'created_at', 'updated_at']) // Do some querying..
                            ->whereBetween('created_at', array($fromDate, $toDate))
                            ->orderBy($sortBy);

        $columns = [ // Set Column to be displayed
            'Id' => 'id',
            'Patient Name' => 'name',
            'Appointment Type' => 'type',
            'Date' => 'date',
            'Time' => 'time',
            'Type' => 'type',
            'Appointment created at' => 'created_at',
            'Appointment updated at' => 'updated_at'
        ];

        // Generate Report with flexibility to manipulate column class even manipulate column value (using Carbon, etc).
        return PdfReport::of($title, $meta, $queryBuilder, $columns)
                    ->editColumn('created_at', [ // Change column class or manipulate its data for displaying to report
                        'displayAs' => function($result) {
                            return $result->created_at->format('d M Y');
                        },
                        'class' => 'left'
                    ])
                    ->editColumns(['Total', 'Status'], [ // Mass edit column
                        'class' => 'left light'
                    ])->stream(); // other available method: download('filename') to download pdf / make() that will producing DomPDF / SnappyPdf instance so you could do any other DomPDF / snappyPdf method such as stream() or download()
    }
}
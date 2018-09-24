<?php
namespace App\Http\Controllers\Admin;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Auth\Role\Role;
use DB;
use PdfReport;

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
            //'time' => 'required|after:now',
            // 'time_start' => 'date_format:date',
            // 'required|date_format:H:i|after:time_start',
            'time' => 'required',
        ];
        $customMessages = [
            'name.regex' => 'Name cannot contain numbers and special characters',
            'date.after' => 'Appointment Date can not be today, tomorrow onward',
            'time.after' => 'Appointment Time cannot be now or past'
        ];
        $this->validate($request, $validatedData, $customMessages);
        
        // $count = DB::table('appointments')->where('id', $request->id)
        //                         ->count();
        // $message = "";
        // if($count > 0){
        //     $message = 'Appointment id exist';
        // }else{
        //     Appointment::create($request->all());
        //     return redirect()->route('admin.appointments')->with('message', 'Appointment added successfully!');
        // }
        Appointment::create($request->all());
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
            'Appointment updated at' => 'updated_at' // if no column_name specified, this will automatically seach for snake_case of column name (will be registered_at) column from query result
            // 'name' => function($result) { // You can do if statement or any action do you want inside this closure
            //     return ($result->balance > 100000) ? 'Rich Man' : 'Normal Guy';
            // }
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
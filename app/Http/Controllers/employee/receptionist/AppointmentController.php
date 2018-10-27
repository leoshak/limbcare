<?php

namespace App\Http\Controllers\employee\receptionist;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Auth\Role\Role;
use DB;

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
        return view('employee.receptionist.appointments.index', compact('appointments', 'key'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.receptionist.appointments.add');
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
        return view('employee.receptionist.appointments.add')->with(['message' => 13 - $count . 'time slots are available.', 'appointments' => $appointments]);
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
        return redirect()->route('employee.receptionist.appointments')->with('message', 'Appointment added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        return view('employee.receptionist.appointments.show', ['appointment' => $appointment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        return view('employee.receptionist.appointments.edit', ['appointment' => $appointment, 'roles' => Role::get()]);
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
        return redirect()->intended(route('employee.receptionist.appointments'))->with('message', $message);
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
        return redirect()->route('employee.receptionist.appointments')->with('message', $message);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = patient::all();
        return view('admin.patients.index', compact('patients'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.patients.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, patient $patient)
    {

        $validatedData = $request->validate([
            // 'id' => 'required',
            // 'nic' => 'required',
            //'name' => 'required|string',
            'name'     => 'required|regex:/^[\pL\s\-]+$/u',
            'nic' => 'required|regex:/[0-9]{9}[V-v]/',
            'address' => 'required',
            'password' => 'required|min:8',
            'confirm-password' => 'required|same:password',


            'email' => 'required|email',

            //'mobile' => 'required|min:11|numeric',
            'mobile' => 'required|regex:/(0)[0-9]{9}/'

            // 'birthday' => 'required'
        ]);



        DB::insert('INSERT INTO `patient` ( `name`,`email`,`nic`, `password`, `mobile`, `address`) VALUES ( ?,?, ?, ?, ? ,?)',[  $request['name'],$request['email'], $request['nic'], $request['password'], $request['mobile'],$request['address']]);
        //return view('admin.patients.success');
        return redirect()->route('admin.patients')->with('message', 'Patient added successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {

        return view('admin.patients.show', ['patient' => $patient]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient, Request $request)
    {
        return view('admin.patients.edit', ['patient' => $patient]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {

        $validatedData = $request->validate([
            // 'id' => 'required',
            // 'nic' => 'required',
            //'name' => 'required|string',
            'name'     => 'required|regex:/^[\pL\s\-]+$/u',
            'nic' => 'required|regex:/[0-9]{9}[V-v]/',
            'address' => 'required',
            'email' => 'required|email',

            //'mobile' => 'required|min:11|numeric',
            'mobile' => 'required|regex:/(0)[0-9]{9}/'

            // 'birthday' => 'required'
        ]);
        $patient->name = $request->get('name');
        $patient->nic = $request->get('nic');
        $patient->email = $request->get('email');
        $patient->address= $request->get('address');

        $patient->mobile = $request->get('mobile');

        // if ($request->has('password')) {
        //     $user->password = bcrypt($request->get('password'));
        // }
        // $user->active = $request->get('active', 0);
        // $user->confirmed = $request->get('confirmed', 0);
        $patient->save();
        $message = 'Successfully updated patient named '.$patient->name.' with id '.$patient->id;
        return redirect()->intended(route('admin.patients'))->with('message', $message);
    }


    public function destroy(Patient $patient)
    {
        $message = 'Successfully deleted patient named :- '.$patient->name.' with ID :-'.$patient->id;

        $patient->delete();
        //careturn view('admin.patients.delete',['patient' => $patient]);
        return redirect()->route('admin.patients')->with('message', $message);

    }
}

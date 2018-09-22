<?php

namespace App\Http\Controllers\Admin;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Validator;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = doctor::all();

        return view('admin.doctors.index', compact('doctors'));
    }
    public function add()
    {
        return view('admin.doctors.add');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response66
     */
    public function create(Request $request)
    {


        $validatedData = $request->validate([

            'name'     => 'required|regex:/^[\pL\s\-]+$/u',
            //'nic' => 'required|regex:/[0-9]{9}[V-v]/',
            //'address' => 'required',
            'password' => 'required|min:8',
            'comfirm-password' => 'required|same:password',
            'hospital' => 'required|regex:/^[\pL\s\-]+$/u',


            'email' => 'required|email',

            //'mobile' => 'required|min:11|numeric',
            'mobile' => 'required|regex:/(0)[0-9]{9}/'

            // 'birthday' => 'required'
        ]);

        DB::insert('INSERT INTO `doctors` (`name`,`email`,`hospital`,`password`,`mobile`) VALUES  ( ?,?,?,?,?)' ,[$request['name'], $request['email'], $request['hospital'],$request['password'],$request['mobile']]);

        return redirect()->route('admin.doctors')->with('message', 'Doctor added successfully!');

    }

    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public $timestamps = false;

    public function show( Doctor $doctor)
    {
        return view('admin.doctors.show',['doctor' => $doctor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor, Request $request)//
    {
        return view('admin.doctors.edit',['doctor' => $doctor]);

     }

    public function delete(Request $request, Doctor $doctor)//Request $request, Employee $employee
    {

    }



    public function update(Request $request, Doctor $doctor)
    {
        $validatedData = $request->validate([
            'name'     => 'required|regex:/^[\pL\s\-]+$/u',
            'hospital' => 'required|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|email',
            'mobile' => 'required|regex:/(0)[0-9]{9}/'

        ]);
        $doctor->name = $request->get('name');
        $doctor->hospital = $request->get('hospital');
        $doctor->email = $request->get('email');
        $doctor->mobile = $request->get('mobile');

        $doctor->save();
     $message = 'Successfully updated doctor named '.$doctor->name.' with id '.$doctor->id;
        return redirect()->intended(route('admin.doctors'))->with('message',$message);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $message = 'Successfully deleted doctor named :- '.$doctor->name.' with ID :-'.$doctor->id;
        $doctor->delete();

        return redirect()->route('admin.doctors')->with('message', $message);
    }


}

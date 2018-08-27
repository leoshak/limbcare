<?php

namespace App\Http\Controllers\Admin;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Auth\Role\Role;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('admin.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employees.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Employee::create($request->all());
        return redirect()->route('admin.employees')->with('message', 'Employee added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('admin.employees.show', ['employee' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('admin.employees.edit', ['employee' => $employee, 'roles' => Role::get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)//Request $request, Employee $employee
    {
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|max:255'
        // ]);

        // $validator->sometimes('email', 'unique:users', function ($input) use ($user) {
        //     return strtolower($input->email) != strtolower($user->email);
        // });

        // $validator->sometimes('password', 'min:6|confirmed', function ($input) {
        //     return $input->password;
        // });

        // if ($validator->fails()) return redirect()->back()->withErrors($validator->errors());

        $employee->name = $request->get('inputName');
        $employee->address = $request->get('inputAddress');
        $employee->employeeType = $request->get('inputState');

        // if ($request->has('password')) {
        //     $user->password = bcrypt($request->get('password'));
        // }

        // $user->active = $request->get('active', 0);
        // $user->confirmed = $request->get('confirmed', 0);

        $employee->save();

        // //roles
        // if ($request->has('roles')) {
        //     $user->roles()->detach();

        //     if ($request->get('roles')) {
        //         $user->roles()->attach($request->get('roles'));
        //     }
        // }
        $message = 'Successfully updated employee named '.$employee->name.' with id '.$employee->id;
        return redirect()->intended(route('admin.employees'))->with('message', $message);

        // return view('admin.employees.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)//Employee $employee
    {
        $message = 'Successfully deleted employee named '.$employee->name.' with id '.$employee->id;
        $employee->delete();
        return redirect()->route('admin.employees')->with('message', $message);
    }
}

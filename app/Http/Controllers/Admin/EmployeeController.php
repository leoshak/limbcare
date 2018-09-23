<?php

namespace App\Http\Controllers\Admin;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Auth\Role\Role;
use Ramsey\Uuid\Uuid;
use App\Models\Auth\User\User;
use DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $key = $request->input('key');
        // $emp = Employee::latest()->search($key)->paginate(1);

        $employees = Employee::latest()->search($key)->paginate(20);
        return view('admin.employees.index', compact('employees', 'key'));
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
    public function store(Request $request,Employee $employee)
    {
        $lastid=0;
        //'id', 'nic', 'name', 'employeeType', 'address', 'birthday'
        $validatedData = [
            'emp_pic' => 'required',
            //'name' => 'required|regex:/^[a-zA-Z]+$/u|max:255|unique:users,name,'.$user->id,
            'name' => 'required|regex:/^[a-zA-Z ]+$/u|max:255',
            'nic' => 'required|digits:9',//size:9|regex:/^[0-9]*$/
            'employeeType' => 'required',
            'birthday' => 'required|date_format:Y-m-d|before:today',
            'address' => 'required|regex:/^[a-zA-Z0-9 ,\/]+$/'
        ];

        $customMessages = [
            'name.regex' => 'Name cannot contain numbers and special characters',
            'nic.digits' => 'NIC must contains only 9 numbers',
            'birthday.before' => 'Funny! Birthday can not be today or future',
            'address.regex' => 'Address cannot contain special characters like # . @'
        ];

        $this->validate($request, $validatedData, $customMessages);
        
        // Employee::create($request->all());

        $file=$request ->file('emp_pic');
       
        $employees=DB::select('select * from employees ORDER BY id DESC LIMIT 1');
                
        $name="panding";
        $type=$file->guessExtension();
        
         foreach($employees as $employeess)
         {
             $lastid=$employeess->id;
             
         }
         
         $lastid=$lastid;
         
         $name=$lastid."pic.".$type;
         $file->move('image/emp/profile',$name);
         
        //find the role by id
        if ($request->get('employeeType') == 'Receptionist') {
            $role = Role::findOrFail(3);
        } elseif ($request->get('employeeType') == 'Director') {
            $role = Role::findOrFail(5);
        } elseif ($request->get('employeeType') == 'PNO') {
            $role = Role::findOrFail(4);
        } else {
            $role = Role::findOrFail(2);
        }

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('nic')),
            'confirmation_code' => Uuid::uuid4(),
            'confirmed' => true,
            'usertype' => $request->get('employeeType')
        ]);
        // assign the role to a user based on the select box from the form.
        $user->roles()->attach($role);
        // return a view

        $employee->name = $request->get('name');
        $employee->nic = $request->get('nic');
        $employee->employeeType = $request->get('employeeType');
        $employee->emp_pic = $name;
        $employee->email = $request->get('email');
        $employee->contactNo = $request->get('contactNo');
        $employee->birthday = $request->get('birthday');
        $employee->address = $request->get('address');
        $employee->save();
        
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

        $validatedData = [
            'inputName' => 'required|regex:/^[a-zA-Z ]+$/u|max:255',
            'empType' => 'required',
            'inputAddress' => 'required|regex:/^[a-zA-Z0-9 ,]*$/',
        ];
        
        $customMessages = [
            'inputName.regex' => 'Name cannot contain numbers and special characters',
            'inputAddress.regex' => 'Address cannot contain special characters like . / @'
        ];

        $this->validate($request, $validatedData, $customMessages);
        
        $employee->name = $request->get('inputName');
        $employee->address = $request->get('inputAddress');
        $employee->employeeType = $request->get('empType');

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
        $user = DB::table('users')->where('email',$employee->email)->delete();
        $employee->delete();
        return redirect()->route('admin.employees')->with('message', $message);
    }
}

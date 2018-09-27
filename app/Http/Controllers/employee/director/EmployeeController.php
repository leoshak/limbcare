<?php

namespace App\Http\Controllers\employee\director;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Auth\Role\Role;
use Ramsey\Uuid\Uuid;
use App\Models\Auth\User\User;
use DB;
use PdfReport;
use Carbon\Carbon;
use Validator;
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
        return view('employee.director.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.director.employees.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Employee $employee)
    {
        $lastid=0;

        //check for duplicate
        Validator::extend('uniqueEmployeeCheck', function ($attribute, $value, $parameters, $validator) {
            $count = DB::table('employees')->where('email', $value)->count();
        
            return $count === 0;
        });

        //'id', 'nic', 'name', 'employeeType', 'address', 'birthday'
        $validatedData = [
            'emp_pic' => 'required',
            //'name' => 'required|regex:/^[a-zA-Z]+$/u|max:255|unique:users,name,'.$user->id,
            'name' => 'required|regex:/^[a-zA-Z .]+$/u|max:255',
            'nic' => 'required|digits:9',//size:9|regex:/^[0-9]*$/
            'employeeType' => 'required',
            'birthday' => 'required|date_format:Y-m-d|before:today',
            'address' => 'required|regex:/^[a-zA-Z0-9 ,\/]+$/',
            'email' => "uniqueEmployeeCheck:{$request->email}"
        ];

        $customMessages = [
            'name.regex' => 'Name cannot contain numbers and special characters',
            'nic.digits' => 'NIC must contains only 9 numbers',
            'birthday.before' => 'Funny! Birthday can not be today or future',
            'address.regex' => 'Address cannot contain special characters like # . @',
            'email' => 'Employee already in the system'
        ];

        $this->validate($request, $validatedData, $customMessages);
        
        // Employee::create($request->all());
        $file=$request ->file('emp_pic');
       
        $employees=DB::select('select * from employees ORDER BY id DESC LIMIT 1');

        //check if employee exist before adding new one
        // $count = Employee::where('email', '=' , $employee->email)->count();
        // if($count == 1) {
        //     abort(405, 'Trying to employee who is in system');
        // }
                
        $name="panding";
        $type=$file->guessExtension();
        
         foreach($employees as $employeess)
         {
             $lastid=$employeess->id;
             
         }
         
         $lastid=$lastid;
         
         $name=$lastid."pic.".$type;
         $file->move('image/emp/profile',$name);
         
        //find the role by id and add initial salary and initial overdue when new employee insert
        $initialSalary = 0;
        $overdue = 0;
        if ($request->get('employeeType') == 'Receptionist') {
            $role = Role::findOrFail(3);
            $initialSalary = 35000;
            $overdue = 100;
        } elseif ($request->get('employeeType') == 'Director') {
            $role = Role::findOrFail(5);
            $initialSalary = 60000;
            $overdue = 250;
        } elseif ($request->get('employeeType') == 'PNO') {
            $role = Role::findOrFail(4);
            $initialSalary = 55000;
            $overdue = 230;
        } else {
            $role = Role::findOrFail(2);
        }

        //insert newly added employee into user table to login and and other things
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
        $employee->contactNo = $request->get('contact');
        $employee->birthday = $request->get('birthday');
        $employee->address = $request->get('address');
        $employee->save();

        //get newly inserted employee id
        // $empId=DB::select('select id from employees ORDER BY id DESC LIMIT 1');

        //assign basic salary to doctors
        DB::insert('INSERT INTO `employee_initial_salary` (`emp_id`,`employeeType`,
        `basic_salary`, `overdue`, `status`, `date`) VALUES (?,?,?,?,?,?)',
        [$employee->id, $employee->employeeType,
        $initialSalary, $overdue, 'active', Carbon::now(), Carbon::now(), Carbon::now()]);

        return redirect()->route('director.employees')->with('message', 'Employee added successfully!');
    }


    /**
     * Display the specified resource.
     *dashboard
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('employee.director.employees.show', ['employee' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('employee.director.employees.edit', ['employee' => $employee, 'roles' => Role::get()]);
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
        $validatedData = [
            'inputName' => 'required|regex:/^[a-zA-Z ]+$/u|max:255',
            'empType' => 'required',
            'inputAddress' => 'required|regex:/^[a-zA-Z0-9 ,\/]+$/'
        ];
        
        $customMessages = [
            'inputName.regex' => 'Name cannot contain numbers and special characters',
            'inputAddress.regex' => 'Address cannot contain special characters like . / @'
        ];
        
        $this->validate($request, $validatedData, $customMessages);
        
        $employee->name = $request->get('inputName');
        $employee->email = $request->get('email');
        $employee->contactNo = $request->get('contact');
        $employee->address = $request->get('inputAddress');
        $employee->employeeType = $request->get('empType');
        $employee->save();

        DB::table('users')
        ->where('email', $employee->email)
        ->update(['email' => $request->get('email'), 'usertype' => $request->get('empType'), 'name' => $request->get('inputName')]);

        $message = 'Successfully updated employee named '.$employee->name.' with id '.$employee->id;
        return redirect()->intended(route('director.employees'))->with('message', $message);
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

        DB::table('employee_initial_salary')->where('emp_id', $employee->id)->update(array(
            'status'=>'disable'));

        return redirect()->route('director.employees')->with('message', $message);
    }
    
}

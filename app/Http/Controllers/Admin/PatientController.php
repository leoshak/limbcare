<?php

namespace App\Http\Controllers\Admin;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use PdfReport;
use Carbon\Carbon;
use App\Models\Auth\Role\Role;
use App\Models\Auth\User\User;
use Ramsey\Uuid\Uuid;
use Validator;

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
    public function re()
    {
        $data = DB::table('patient')
            ->select(
                DB::raw('gender as gender'),
                DB::raw('count(*) as number'))
            ->groupBy('gender')
            ->get();
        $array[] = ['Gender', 'Number'];
        foreach($data as $key => $value)
        {
            $array[++$key] = [$value->gender, $value->number];
        }

        return view('admin.patients.report')->with('gender', json_encode($array));
    }
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
        $lastid =0;

        //check for duplicate
        Validator::extend('uniquePatientCheck', function ($attribute, $value, $parameters, $validator) {
            $count = DB::table('users')->where('email', $value)->count();
        
            return $count === 0;
        });

        $validatedData = $request->validate([
            // 'id' => 'required',
            // 'nic' => 'required',
            //'name' => 'required|string',
            'name'     => 'required|regex:/^[\pL\s\-]+$/u',
            'nic' => 'required|regex:/[0-9]{9}[V-v]/',
            'address' => 'required',
            'gender'=> 'in:Male,Female',

            'password' => 'required|min:8',
            'confirm-password' => 'required|same:password',


            'email' => 'required|email',

            //'mobile' => 'required|min:11|numeric',
            'mobile' => 'required|regex:/(0)[0-9]{9}/',
            'email' => "uniquePatientCheck:{$request->email}"

            // 'birthday' => 'required'
        ]);
        $file=$request ->file('pat_pic');

        $patients=DB::select('select * from patient ORDER BY id DESC LIMIT 1');

        $name="panding";
        $type=$file->guessExtension();

        foreach($patients as $patientss)
        {
            $lastid=$patientss->id;

        }

        $lastid=$lastid;

        $name=$lastid."pic.".$type;
        $file->move('image/pat/profile',$name);

            $time =Carbon::now()->format('Y-m-d H:i:s');

        DB::insert('INSERT INTO `patient` ( `name`,`email`,`gender`,`nic`, `password`, `mobile`, `address`,`pat_pic`, `created_at`) VALUES ( ?,?,?, ?, ?, ? ,?,?,?)',[  $request['name'],$request['email'],$request['gender'], $request['nic'], $request['password'], $request['mobile'],$request['address'],$name,$time]);
        
        
        //attach the role to login in to correct dashboard
        $role = Role::findOrFail(7);

        //insert newly added patient into user table to login and and other things
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'confirmation_code' => Uuid::uuid4(),
            'confirmed' => true,
            'usertype' => 'Patient'
        ]);

        // assign the role to a user role.
        $user->roles()->attach($role);
        
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
        //delete patient record from users table
        $user = DB::table('users')->where('email',$patient->email)->delete();
        
        $patient->delete();
        //careturn view('admin.patients.delete',['patient' => $patient]);
        return redirect()->route('admin.patients')->with('message', $message);

    }



    public function displayReport(Request $request)
    {
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');
        $sortBy = $request->input('sort_by');

        $title = 'Registered Patient Report'; // Report title

        $meta = [ // For displaying filters description on header
            'Registered on' => $fromDate . ' To ' . $toDate,
            'Sort By' => $sortBy
        ];

        $queryBuilder = patient::select(['id','created_at','name', 'email','Gender', 'nic','mobile','address']) // Do some querying..
        ->whereBetween('created_at', [$fromDate, $toDate]);

        $columns = [ // Set Column to be displayed

            'Name' => 'name',
            'Registered At' =>'created_at', // if no column_name specified, this will automatically seach for snake_case of column name (will be registered_at) column from query result
            'Email' => 'email',
            'Gender' =>'Gender',
            'NIC' => 'nic'

        ];

        // Generate Report with flexibility to manipulate column class even manipulate column value (using Carbon, etc).
        return PdfReport::of($title, $meta, $queryBuilder, $columns)

            ->editColumns(['Registered At','Name','Email','Gender','NIC'], [ // Mass edit column
                'class' => 'right '
            ])

            ->limit(20) // Limit record to be showed
            ->stream(); // other available method: download('filename') to download pdf / make() that will producing DomPDF / SnappyPdf instance so you could do any other DomPDF / snappyPdf method such as stream() or download()
    }
    public function search(Request $request){

            $searchname =  $request->get('q');
            $patients = patient::where('name','LIKE','%'.$searchname.'%')->orWhere('id','LIKE','%'.$searchname.'%')->get();
            if(count($patients) > 0)
                return view('admin.patients.index')->withPatients($patients)->withQuery ( $searchname );
            else return view ('admin.patients.index')->withMessage('No Details found. Try to search again !');
    }
}

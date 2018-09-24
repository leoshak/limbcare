<?php

namespace App\Http\Controllers\Admin;
use Charts;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Validator;
use PdfReport;
use Carbon\Carbon;
use App\Models\Auth\Role\Role;
use App\Models\Auth\User\User;
use Ramsey\Uuid\Uuid;


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

        $lastid=0;
        $name="panding";

        //check for duplicate
        Validator::extend('uniqueDoctorCheck', function ($attribute, $value, $parameters, $validator) {
            $count = DB::table('doctors')->where('email', $value)->count();
        
            return $count === 0;
        });

        $validatedData = $request->validate([

            'name'     => 'required|regex:/^[\pL\s\-]+$/u',
            //'nic' => 'required|regex:/[0-9]{9}[V-v]/',
            //'address' => 'required',
            'password' => 'required|min:8',
            'comfirm-password' => 'required|same:password',
            'hospital' => 'required|regex:/^[\pL\s\-]+$/u',


            'email' => 'required|email',

            //'mobile' => 'required|min:11|numeric',
            'mobile' => 'required|regex:/(0)[0-9]{9}/',
            'email' => "uniqueDoctorCheck:{$request->email}"

            // 'birthday' => 'required'
        ]);
        $time =Carbon::now()->format('Y-m-d H:i:s');
        $file=$request ->file('doc_pic');

        $doctor=DB::select('select * from Doctors ORDER BY id DESC LIMIT 1');

        $type=$file->guessExtension();
        foreach($doctor as $doc)
        {
            $lastid=$doc->id;

        }
        $lastid=$lastid;

        $name=$lastid."pic.".$type;
        $file->move('image/doc/profile',$name);



        DB::insert('INSERT INTO `doctors` (`name`,`email`,`hospital`,`password`,`mobile`,`doc_pic`,`created_at`) VALUES  ( ?,?,?,?,?,?,?)' ,[$request['name'], $request['email'], $request['hospital'],$request['password'],$request['mobile'],$name,$time]);

        
        //attach the role to login in to correct dashboard
        $role = Role::findOrFail(6);

        //insert newly added doctor into user table to login and and other things
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'confirmation_code' => Uuid::uuid4(),
            'confirmed' => true,
            'usertype' => 'Doctor'
        ]);

        // assign the role to a user role.
        $user->roles()->attach($role);
        
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
        
        //delete doctor record from users table
        $user = DB::table('doctor')->where('email',$doctor->email)->delete();

        $doctor->delete();

        return redirect()->route('admin.doctors')->with('message', $message);
    }

    public function report(){
        $viewer = doctor::select(DB::raw("count(month(created_at)) as count"))
        ->orderBy("created_at")
        ->groupBy(DB::raw("month(created_at)"))
        ->get()->toArray();
        $viewer = array_column($viewer, 'count');

        $click = doctor::select(DB::raw("count(*) as count"))
            ->orderBy("created_at")
            ->groupBy(DB::raw("month(created_at)"))
            ->get()->toArray();
        $click = array_column($click, 'count');


        return view('admin.doctors.report')
            ->with('viewer',json_encode($viewer,JSON_NUMERIC_CHECK))
            ->with('click',json_encode($click,JSON_NUMERIC_CHECK));





    }
    public function displayReport(Request $request)
    {
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');
        $sortBy = $request->input('sort_by');

        $title = 'Registered Doctor Report'; // Report title

        $meta = [ // For displaying filters description on header
            'Registered on' => $fromDate . ' To ' . $toDate,
            'Sort By' => $sortBy
        ];

        $queryBuilder = doctor::select(['id','created_at','name', 'email','mobile','hospital']) // Do some querying..
        ->whereBetween('created_at', [$fromDate, $toDate]);

        $columns = [ // Set Column to be displayed

            'Name' => 'name',
            'Registered At' =>'created_at', // if no column_name specified, this will automatically seach for snake_case of column name (will be registered_at) column from query result
            'Hospital' => 'hospital',
            'Email' => 'email',
            'Mobile' =>'mobile'


        ];

        // Generate Report with flexibility to manipulate column class even manipulate column value (using Carbon, etc).
        return PdfReport::of($title, $meta, $queryBuilder, $columns)

            ->editColumns(['Registered At','Name','Hospital','Email','Mobile'], [ // Mass edit column
                'class' => 'right '
            ])

            ->limit(20) // Limit record to be showed
            ->stream(); // other available method: download('filename') to download pdf / make() that will producing DomPDF / SnappyPdf instance so you could do any other DomPDF / snappyPdf method such as stream() or download()
    }
    public function chartjs(){

    }
    public function search(Request $request){

        $searchname =  $request->get('q');
        $Doctors = Doctor::where('name','LIKE','%'.$searchname.'%')->orWhere('id','LIKE','%'.$searchname.'%')->get();
        $message = 'Successfully updated doctor named ';
        if(count($Doctors) > 0)
            return view('admin.Doctors.index')->withDoctors($Doctors)->withQuery ( $searchname )->with('message',$message);
        else return view ('admin.Doctors.index')->withMessage('No Details found. Try to search again !');
    }

}

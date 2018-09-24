<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\Diagnosis;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DiagnosisVal;
use App\Http\Requests\DiagnosisValUpdate;
use App\Models\Patient;

class DiagnosisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $diagnosise=Diagnosis::all();
        return view('admin.diagnosis.index',compact('diagnosise') );
        
    }
    
    public function indexad(Request $request)
    {
        $patients=patient::all();
        return view('admin.diagnosis.indexadd',compact('patients') );
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(patient $patient)
    {
        
        return view('admin.diagnosis.add',['patient' => $patient]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiagnosisVal $request,Diagnosis $diagnosis)
    {
        $lastid=0;
        $name="panding";
        $diagnosis->patientname = $request->get('name');
        $diagnosis->service = $request->get('pa_service');
        $diagnosis->hight = $request->get('pa_height');
        $diagnosis->weight = $request->get('pa_weight');
        $diagnosis->discription = $request->get('pa_discription');
        $diagnosis->skech = $name;
        $diagnosis->consultant_dr = $request->get('pa_dr');
        $diagnosis->patientID = $request->get('ID');
        $diagnosis->save();
       $file=$request ->file('pa_sketch');
       $type=$file->guessExtension();
       $diagnosise =DB::select('select * from diagnosis ORDER BY id DESC LIMIT 1');
        
        foreach($diagnosise as $diagnosisw)
        {
            $lastid=$diagnosisw->id;
        }
        $name=$lastid."sketch.".$type;
        $file->move('image/diagnosis/sketch',$name);

        $diagnosis->skech= $name;
        $diagnosis->save();
         return view('admin.diagnosis.success');
    }
    public function update(DiagnosisValUpdate $request,Diagnosis $diagnosise)
    {
        $diagnosise = DB::select('select * from diagnosis where id ='.$request['id']);
        // $upatevalu = DB::table('diagnosis')->select('id', $request['id'])->get();

        // //  echo $diagnosis['patientname'];
        //   return $diagnosis;
          foreach($diagnosise as $diagnosis)
          {
              $pname=$diagnosis->patientname;
              $phight=$diagnosis->hight;
              $pweight=$diagnosis->weight;
              $pdiscription=$diagnosis->discription;

              if((($pname==$request['name']) and ($phight==$request['hight'])) and(($pweight==$request['Weight']) and ($pdiscription==$request['discription'])))
              {
              $message = 'Nothing to update ';
              return redirect()->intended(route('admin.diagnosis.edit',[$diagnosis->id]))->with('message', $message);
              }
          }
        
        DB::table('diagnosis')
            ->where('id', $request['id'])
            ->update(['patientname' => $request['name'],'hight' =>$request['hight'],'weight' =>$request['Weight'],'discription' =>$request['discription']]);
            return view('admin.diagnosis.success');
    }
    
    public function padelete(Request $request)
    {
        
        DB::table('diagnosis')->where('id', $request['id'])->delete();
         return view('admin.diagnosis.success');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show( Diagnosis $diagnosis)
    {
        return view('admin.diagnosis.show',['diagnosis' => $diagnosis]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit( Diagnosis $diagnosis )
    {
        return view('admin.diagnosis.edit',['diagnosis' => $diagnosis]);
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy( Diagnosis $diagnosis)//Employee $employee
    {
        return view('admin.diagnosis.delete',['diagnosis' => $diagnosis]);
    }
    public function searchpationdiagnosis(Request $request)//Request $request, Employee $employee
    {
        $patients = DB::table('patient')->where('id', $request['search'])->orWhere('name', 'like', '%' . $request['search'] . '%')->get();

        return view('admin.diagnosis.indexadd', compact('patients'));

    }
    public function search(Request $request)//Request $request, Employee $employee
    {
        $diagnosise = DB::table('diagnosis')->where('id', $request['search'])->orWhere('patientname', 'like', '%' . $request['search'] . '%')->get();

        return view('admin.diagnosis.index', compact('diagnosise'));

    }
}
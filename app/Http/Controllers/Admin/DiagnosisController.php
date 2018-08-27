<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Diagnosis;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.diagnosis.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         DB::insert('INSERT INTO `diagnosis` ( `patientname`, `service`, `hight`, `weight`, `discription`, `skech`, `consultant_dr`) VALUES ( ?, ?, ?, ? ,?,?,?)',[  $request['pa_name'], $request['pa_service'], $request['pa_height'], $request['pa_weight'],$request['pa_discription'],$request['pa_sketch'],$request['pa_dr']]);
         return view('admin.diagnosis.success');
    }
    public function update(Request $request)//Request $request, Employee $employee
    {
        DB::table('diagnosis')
            ->where('id', $request['id'])
            ->update(['patientname' => $request['name'],'hight' =>$request['hight'],'weight' =>$request['Weight'],'discription' =>$request['discription']]);
            return view('admin.diagnosis.success');
    }
    
    public function padelete(Request $request)//Request $request, Employee $employee
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
}

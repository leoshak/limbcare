<?php

namespace App\Http\Controllers\Admin;

use App\Models\Financial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class FinancialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.financial.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.financial.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function stor(Request $request)
    {
        DB::insert('INSERT INTO `bill` ( `patientname`, `descrption`, `amount`) VALUES  ( ?, ?, ?)',[$request['bi_name'], $request['bi_note'], $request['bi_am']]);
        return view('admin.financial.success');
    }
    public function salary(Request $request)
    { 
         DB::insert('INSERT INTO `salarypay` (`emp_name`, `amount`) VALUES  ( ?,?)',[$request['emp_name'], $request['emp_am']]);
        return view('admin.financial.success');
    }
    public function other(Request $request)
    { 
         DB::insert('INSERT INTO `otherpay` ( `descrption`, `amount`) VALUES   ( ?,?)',[$request['oth_note'], $request['oth_am']]);
        return view('admin.financial.success');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Financial  $financial
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin.financial.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Financial  $financial
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('admin.financial.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Financial  $financial
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        return view('admin.financial.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Financial  $financial
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        return view('admin.financial.delete');
    }
}

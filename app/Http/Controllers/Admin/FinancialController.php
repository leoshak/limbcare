<?php

namespace App\Http\Controllers\Admin;

use App\Models\FinancialSalaryPayment;
use App\Models\FinancialBillPayment;
use App\Models\FinancialOtherPayment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use DateTime;

class FinancialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $financials = FinancialSalaryPayment::all();
        $bills = FinancialBillPayment::all();
        $otherpays = FinancialOtherPayment::all();        
        return view('admin.financial.index', ['financials' => $financials, 'bills' => $bills, 'otherPayments' => $otherpays]);
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
        $now = new DateTime();

        DB::insert('INSERT INTO `salarypay` (`emp_name`, `date`, `amount`) VALUES  ( ?, ?, ?)',[$request['emp_name'], $now, $request['emp_am']]);
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
    public function show(Financial $financial)
    {
        return view('admin.financial.show', ['financial' => $financial]);
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

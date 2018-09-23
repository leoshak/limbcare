<?php

namespace App\Http\Controllers\employee\director;

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
        return view('employee.director.financial.index', ['financials' => $financials, 'bills' => $bills, 'otherPayments' => $otherpays]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.director.financial.add');
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
        return view('employee.director.financial.success');
    }
    public function salary(Request $request)
    { 
        $now = new DateTime();

        DB::insert('INSERT INTO `salarypay` (`emp_name`, `date`, `amount`) VALUES  ( ?, ?, ?)',[$request['emp_name'], $now, $request['emp_am']]);
        return view('employee.director.financial.success');
    }
    public function other(Request $request)
    { 
         DB::insert('INSERT INTO `otherpay` ( `descrption`, `amount`) VALUES   ( ?,?)',[$request['oth_note'], $request['oth_am']]);
        return view('employee.director.financial.success');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Financial  $financial
     * @return \Illuminate\Http\Response
     */
    public function show(FinancialBillPayment $financialBill)
    {
        //echo FinancialBillPayment::find('1');
        return view('employee.director.financial.showBill', ['financialBill' => $financialBill]);
    }

    public function showSalaryPayment(FinancialSalaryPayment $financialSalaryPayment) {
        return view('employee.director.financial.showSalary', ['financialSalaryPayment' => $financialSalaryPayment]);
    }

    public function showOtherPayment(FinancialOtherPayment $financialOtherPayment) {
        return view('employee.director.financial.showOtherPay', ['financialOtherPayment' => $financialOtherPayment]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Financial  $financial
     * @return \Illuminate\Http\Response
     */
    public function edit(FinancialBillPayment $financialBill)
    {
        return view('employee.director.financial.edit', ['financialBill' => $financialBill]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Financial  $financial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::table('bill')
        ->where('id', $request['id'])
        ->update(['patientname' =>$request['patientname'],'descrption' =>$request['descrption'],'amount' =>$request['amount']]);
        return view('employee.director.financial.success');
    }

    //financial salary edit
    public function editSalary(FinancialSalaryPayment $financialSalary)
    {
        return view('employee.director.financial.edit_salary', ['financialSalary' => $financialSalary]);
    }
    public function updateSalary(Request $request)
    {
        DB::table('salarypay')
        ->where('id', $request['id'])
        ->update(['emp_name' =>$request['emp_name'],'date' =>$request['date'],'amount' =>$request['amount']]);
        return view('employee.director.financial.success');
    }

    //financial otherpay edit
    public function editOtherPay(FinancialOtherPayment $financialOtherPay)
    {
        return view('employee.director.financial.edit_otherpay', ['financialOtherPay' => $financialOtherPay]);
    }
    public function updateOtherPay(Request $request)
    {
        DB::table('otherpay')
        ->where('id', $request['id'])
        ->update(['descrption' =>$request['descrption'], 'amount' =>$request['amount']]);
        return view('employee.director.financial.success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Financial  $financial
     * @return \Illuminate\Http\Response
     */
    //delete salay record
    public function destroyRequest(FinancialSalaryPayment $financialSalary)
    {
        return view('employee.director.financial.delete', ['financialSalary' => $financialSalary]);
    }

    public function destroy(Request $request)
    {
        DB::table('salarypay')->where('id', $request['id'])->delete();
        return redirect()->route('employee.director.financial')->with('message', 'Successfully deleted');
    }

    //delete bill record
    public function destroyBillRequest(FinancialBillPayment $financialBill)
    {
        return view('employee.director.financial.deleteBill', ['financialBill' => $financialBill]);
    }

    public function destroyBill(Request $request)
    {
        DB::table('bill')->where('id', $request['id'])->delete();
        return redirect()->route('employee.director.financial')->with('message', 'Successfully deleted');
    }
    
    //delete other record
    public function destroyOtherPayRequest(FinancialOtherPayment $financialOtherPay)
    {
        return view('employee.director.financial.deleteOtherPay', ['financialOtherPay' => $financialOtherPay]);
    }

    public function destroyOtherPay(Request $request)
    {
        DB::table('otherpay')->where('id', $request['id'])->delete();
        return redirect()->route('employee.director.financial')->with('message', 'Successfully deleted');
    }
}

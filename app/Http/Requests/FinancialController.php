<?php

namespace App\Http\Controllers\Admin;

use App\Models\FinancialSalaryPayment;
use App\Models\FinancialBillPayment;
use App\Models\FinancialOtherPayment;
use App\Models\Outcome;
use App\Models\Income;
use App\Models\Patient;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use DateTime;

use App\Http\Requests\Bill;
use App\Http\Requests\BillIpdate;
use App\Http\Requests\Invoiceval;
use App\Http\Requests\Salary;
use App\Http\Requests\Salarypdate;
use App\Http\Requests\OtherPay;
use App\Http\Requests\OtherPayUpdate;

class FinancialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outcomes = Outcome::all();
        $incomes = Income::all();   
        $incomevalu=0;
        $outcomevalu=0;
        foreach($outcomes as $outcome)
        {
            $outcomevalu=  $outcomevalu+$outcome->amount;
        }
        foreach($incomes as $income)
        {
            $incomevalu= $incomevalu+$income->amount;
        }

        $profit= $incomevalu-$outcomevalu;
        return view('admin.financial.index', ['outcomes' => $outcomevalu, 'incomes' => $incomevalu,'profit' => $profit]);
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
    
    public function indexbill()
    {
        $Invoices = Invoice::all();
      
        $bills = FinancialBillPayment::all();
        $patients=patient::all();
        return view('admin.financial.index_bill',['Invoices' => $Invoices],compact('bills'),['patients' => $patients]);
    }
    public function addbill()
    {
        $Invoices = Invoice::all();
      
        $bills = FinancialBillPayment::all();
        $patients=patient::all();
        return view('admin.financial.index_billindex',['Invoices' => $Invoices],compact('bills'),['patients' => $patients]);
    }
    
    public function invoice()
    {
        $Invoices = Invoice::all();
        
        $patients=patient::all();
        return view('admin.financial.index_invoice',['Invoices' => $Invoices],compact('patients'));
    }
    public function addinvoice()
    {
        $patients=patient::all();
        return view('admin.financial.add_invoice',compact('patients'));
    }
    
    public function newinvoice(patient $patient)
    {
       
        return view('admin.financial.add_newinvoice',['patient' => $patient]);
    }

    
    public function newTinvoice(Invoiceval $request,Invoice $Invoices)
    {
        
        $Invoices->amount = $request->get('amount');
        $Invoices->remaining_amount = $request->get('amount');
        $Invoices->patient_ID = $request->get('id');
        $Invoices->save();
        return view('admin.financial.success_invoice');
     }
    public function indexsalary()
    {
        $financials = FinancialSalaryPayment::all();
        return view('admin.financial.index_salary',['financials' => $financials]);
    }
    
    public function addsalary()
    {
        return view('admin.financial.add_salary');
    }
    
    public function indexother()
    {
        $otherpays = FinancialOtherPayment::all(); 
        return view('admin.financial.index_other',['otherPayments' => $otherpays]);
    }public function addother()
    {return view('admin.financial.add_other');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function stor(Bill $request)
    {
        DB::insert('INSERT INTO `income` ( `amount`) VALUES  ( ?)',[ $request['bi_am']]);
        DB::insert('INSERT INTO `bill` ( `patientname`, `descrption`, `amount`) VALUES  ( ?, ?, ?)',[$request['bi_name'], $request['bi_note'], $request['bi_am']]);
        return view('admin.financial.success_bill');
    }
    public function salary(Salary $request)
    { 
        $now = new DateTime();
        DB::insert('INSERT INTO `outcome` ( `amount`) VALUES  ( ?)',[ $request['emp_am']]);
        DB::insert('INSERT INTO `salarypay` (`emp_name`, `date`, `amount`) VALUES  ( ?, ?, ?)',[$request['emp_name'], $now, $request['emp_am']]);
        return view('admin.financial.success_salary');
    }
    public function other(OtherPay $request)
    { 
        $type=$request['oth_type'];

        if($type=="")
        {
            $message = 'Nothig select in payment type ';
            return redirect()->intended(route('admin.financial.add_other'))->with('message', $message);
        
        }
        if($type=="income")
        {
            DB::insert('INSERT INTO `income` ( `amount`) VALUES  ( ?)',[ $request['oth_am']]);
            DB::insert('INSERT INTO `otherpay` ( `descrption`,`type`, `amount`) VALUES   ( ?,?,?)',[$request['oth_note'],$request['oth_type'], $request['oth_am']]);
            return view('admin.financial.success_other');
        }
        else if($type=="outcome")
        {
        DB::insert('INSERT INTO `outcome` ( `amount`) VALUES  ( ?)',[ $request['oth_am']]);
        DB::insert('INSERT INTO `otherpay` ( `descrption`,`type`, `amount`) VALUES   ( ?,?,?)',[$request['oth_note'],$request['oth_type'], $request['oth_am']]);
        return view('admin.financial.success_other');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Financial  $financial
     * @return \Illuminate\Http\Response
     */
    public function show(FinancialBillPayment $financialBill)
    {
        $Invoices = Invoice::all();
        $patients=patient::all();
        return view('admin.financial.showBill', ['financialBill' => $financialBill],compact('patients'),compact('Invoices'));
    }
    
    public function showinvoce(Invoice $Invoice)
    {
        $patients=patient::all();
        return view('admin.financial.showinvoice', ['Invoice' => $Invoice],compact('patients'));
    }
    public function showSalaryPayment(FinancialSalaryPayment $financialSalaryPayment) {
        return view('admin.financial.showSalary', ['financialSalaryPayment' => $financialSalaryPayment]);
    }

    public function showOtherPayment(FinancialOtherPayment $financialOtherPayment) {
        return view('admin.financial.showOtherPay', ['financialOtherPayment' => $financialOtherPayment]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Financial  $financial
     * @return \Illuminate\Http\Response
     */
    public function edit(FinancialBillPayment $financialBill)
    {
        return view('admin.financial.edit', ['financialBill' => $financialBill]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Financial  $financial
     * @return \Illuminate\Http\Response
     */
    public function update(BillIpdate $request)
    {
        $bills = DB::select('select * from bill where id ='.$request['id']);
        foreach($bills as $bill)
          {
              $patientname=$bill->patientname;
              $descrption=$bill->descrption;
                
              if(($patientname==$request['patientname']) and($descrption==$request['descrption']) )
              {
              $message = 'Nothing to update';
              return redirect()->intended(route('admin.financial.edit',[$bill->id]))->with('message', $message);
              }
              
          }
        DB::table('bill')
        ->where('id', $request['id'])
        ->update(['patientname' =>$request['patientname'],'descrption' =>$request['descrption']]);
        return view('admin.financial.success_bill');
    }

    //financial salary edit
    public function editSalary(FinancialSalaryPayment $financialSalary)
    {
        return view('admin.financial.edit_salary', ['financialSalary' => $financialSalary]);
    }
    public function updateSalary(Request $request)
    {
        DB::table('salarypay')
        ->where('id', $request['id'])
        ->update(['emp_name' =>$request['emp_name']]);
        return view('admin.financial.success_salary');
    }

    //financial otherpay edit
    public function editOtherPay(FinancialOtherPayment $financialOtherPay)
    {
        return view('admin.financial.edit_otherpay', ['financialOtherPay' => $financialOtherPay]);
    }
    public function updateOtherPay(OtherPayUpdate $request)
    {
        $other = DB::select('select * from otherpay where id ='.$request['id']);
        foreach($other as $others)
          {
              $descrption=$others->descrption;
                
              if(($descrption==$request['descrption']) )
              {
              $message = 'Nothing to update';
              return redirect()->intended(route('admin.financial.edit_otherpay',[$others->id]))->with('message', $message);
              }
              
          }
        if($type=="")
        {
            $message = 'Nothig select in payment type ';
            return redirect()->intended(route('admin.financial.add_other'))->with('message', $message);
        
        }
        DB::table('otherpay')
        ->where('id', $request['id'])
        ->update(['descrption' =>$request['descrption']]);
        return view('admin.financial.success_other');
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
        return view('admin.financial.delete', ['financialSalary' => $financialSalary]);
    }

    public function destroy(Request $request)
    {
        DB::table('salarypay')->where('id', $request['id'])->delete();
        return view('admin.financial.success_salary');
    }

    //delete bill record
    public function destroyBillRequest(FinancialBillPayment $financialBill)
    {
        return view('admin.financial.deleteBill', ['financialBill' => $financialBill]);
    }

    public function destroyBill(Request $request)
    {
        DB::table('bill')->where('id', $request['id'])->delete();
        return view('admin.financial.success_bill');
    }
    
    //delete other record
    public function destroyOtherPayRequest(FinancialOtherPayment $financialOtherPay)
    {
        return view('admin.financial.deleteOtherPay', ['financialOtherPay' => $financialOtherPay]);
    }

    public function destroyOtherPay(Request $request)
    {
        DB::table('otherpay')->where('id', $request['id'])->delete();
        return view('admin.financial.success_other');
    }
}

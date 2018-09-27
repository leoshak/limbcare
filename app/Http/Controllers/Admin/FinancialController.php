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
use App\Models\Employee;
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
    
    public function billinvoicew(Invoice $invoice)
    {
        $patients=patient::all();
        return view('admin.financial.add_bill',['invoice' => $invoice],compact('patients'));
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
         $emp=Employee::all();
        
        return view('admin.financial.index_salary',['financials' => $financials],['emp' => $emp]);
    }
    
    public function addsalary(Employee $emp)
    {
        return view('admin.financial.add_salary',['emp' => $emp]);
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
    public function stor(Bill $request,FinancialBillPayment $billw,Income $in)
    { 
        $bills= DB::table('invoice')->where('id', $request['inID'])->value('remaining_amount');
        $addam=$request['bi_am'];
        if($addam>$bills)
        {
            $message = 'Pyament  maximum ';
            return redirect()->intended(route('admin.financial.addbillinvoice', [$request['inID']]))->with('message', $message);
       
        }
        $bills=$bills-$addam;
        DB::table('invoice')
        ->where('id', $request['inID'])
        ->update(['remaining_amount' =>$bills]);
        $in->amount=$request['emp_am'];
        $in->save();

        $billw->invoice_id=$request['inID'];
        $billw->empid=$request['empid'];
        $billw->amount=$request['bi_am'];
        $billw->save();
        return view('admin.financial.success_bill');
    }
    public function salary(Salary $request,Outcome $in,FinancialSalaryPayment $sala)
    { 
        $in->amount=$request['emp_am'];
        $in->save();
         $request['date'];
        $sala->emp_id=$request['empid'];
        $sala->date=$request['date'];
        $sala->amount=$request['emp_am'];
        $sala->save();
        // DB::insert('INSERT INTO `outcome` ( `amount`) VALUES  ( ?)',[ $request['emp_am']]);
        // DB::insert('INSERT INTO `salarypay` (`emp_name`, `date`, `amount`) VALUES  ( ?, ?, ?)',[$request['emp_name'], $now, $request['emp_am']]);
        return view('admin.financial.success_salary');
    }
    public function other(OtherPay $request,Outcome $in,Income $isn)
    { 
        $type=$request['oth_type'];

        if($type=="")
        {
            $message = 'Nothig select in payment type ';
            return redirect()->intended(route('admin.financial.add_other'))->with('message', $message);
        
        }
        if($type=="income")
        {
            $isn->amount=$request['oth_am'];
            $isn->save();
           // DB::insert('INSERT INTO `income` ( `amount`) VALUES  ( ?)',[ $request['oth_am']]);
            DB::insert('INSERT INTO `otherpay` ( `descrption`,`type`, `amount`) VALUES   ( ?,?,?)',[$request['oth_note'],$request['oth_type'], $request['oth_am']]);
            return view('admin.financial.success_other');
        }
        else if($type=="outcome")
        {$in->amount=$request['oth_am'];
            $in->save();
        //DB::insert('INSERT INTO `outcome` ( `amount`) VALUES  ( ?)',[ $request['oth_am']]);
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
        $invoiceid=$financialBill->invoice_id;
        $Invoices = Invoice::all();
        $patients=patient::all();
         $PId= DB::table('invoice')->where('id', $invoiceid)->value('patient_ID');
          $Pname= DB::table('patient')->where('id', $PId)->value('name');
          $array = array('name' => $Pname);
       
        return view('admin.financial.showBill', ['financialBill' => $financialBill],compact('patients'),compact('Invoices'))->with('array', $array);;
    }
    
    public function showinvoce(Invoice $Invoice)
    {
        $patients=patient::all();
        return view('admin.financial.showinvoice', ['Invoice' => $Invoice],compact('patients'));
    }
    public function showSalaryPayment(FinancialSalaryPayment $financialSalaryPayment) {
        $emp=Employee::all();
        return view('admin.financial.showSalary', ['financialSalaryPayment' => $financialSalaryPayment],compact('emp'));
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
    
    public function addsalaryindex()
    {
        $financials = FinancialSalaryPayment::all();
        $emp=Employee::all();
        return view('admin.financial.add_salaryindex',['financials' => $financials],compact('emp'));
    }
    
    public function searchbill(Request $request)
    {
      
        $bills = DB::select('select * from bill where id ='.$request['search']);
        
        return view('admin.financial.index_bill',compact('bills'));
    }
    public function searchinvoice(Request $request)
    {
      
        $Invoices = DB::select('select * from invoice where id ='.$request['search']);
        
        $patients=patient::all();
        return view('admin.financial.index_invoice',['Invoices' => $Invoices],compact('patients'));
    
        return view('admin.financial.index_bill',compact('bills'));
    }
    
    public function searchbillin(Request $request)
    {
      
        
        $Invoices = DB::select('select * from invoice where id ='.$request['search']);
        
        $bills = FinancialBillPayment::all();
        $patients=patient::all();
        return view('admin.financial.index_billindex',['Invoices' => $Invoices],compact('bills'),['patients' => $patients]);
    
        return view('admin.financial.index_bill',compact('bills'));
    }
}

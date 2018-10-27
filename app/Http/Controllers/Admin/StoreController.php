<?php

namespace App\Http\Controllers\Admin;
use Carbon\Carbon;
use PdfReport;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Storeval;
use App\Http\Requests\Storeupdateval;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $store=Store::all();
        return view('admin.store.index',compact('store') );
    }
    public function reportS()
    {
        $storeR=Store::all();
        return view('admin.store.report',compact('storeR') );
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.store.add');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeval $request,Store $storeA)
    {
        // Validator::extend('checkDateSlots', function ($attribute, $value, $parameters, $validator) {
        //     return $value[0] > $value[1];
        // }, 'Items min quantity may not be greater than iteam max !');


        // $validatedData = [
        //     'it_min' => "checkDateSlots:{[$request->it_min, $request->it_max]}"
        // ];

        // $this->validate($request,$validatedData);
        if($request['it_max']<$request['it_min'])
        {
            $message = 'Item maximum size should be greater than minimum size';
            return redirect()->intended(route('admin.store.add'))->with('message', $message);
        }
        $lastid=0;
        
        $name="panding";
       $file=$request ->file('it_pic');
       $up=0;
        $storeA->iteamname = $request->get('it_name');
        $storeA->iteam_quantity = $request->get('it_quantity');
        $storeA->company = $request->get('it_company');
        $storeA->iteam_max = $request->get('it_max');
        $storeA->iteam_min = $request->get('it_min');
        $storeA->quantity_type = $request->get('it_type');
        $storeA->pic = $name;
        $storeA->Data_entry_ID = $request->get('empID');
        $storeA->Data_update_ID = $up;

        $storeA->save();

        $store = DB::select('select * from store ORDER BY id DESC LIMIT 1');
       $type=$file->guessExtension();
       $lastid = 0;
        foreach($store as $Stores)
        {
            $lastid=$Stores->id;
            
        }
        $name=$lastid."item.".$type;
        $file->move('image/store/item',$name);
        
            // DB::table('store')
            // ->where('id', $lastid)
            // ->update(['pic'=> $name]);
            $storeA->pic = $name;
            $storeA->save();

        return view('admin.store.success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store  $store)
    {
        return view('admin.store.show',['stores' => $store]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store  $store)
    {
        return view('admin.store.edit',['stores' => $store]);
    }
    public function min(Store  $store)
    {
        return view('admin.store.minus',['stores' => $store]);
    }
    public function minitem(Request $request)
    {
        $store = DB::select('select * from store where id ='.$request['id']);
        foreach($store as $stores)
          {
            $nowitem=$stores->iteam_quantity;
            
          }
          
          $validatedData = $request->validate([
            'min'     => 'required|integer|min:0'

        ]);
        $nowitem=$nowitem-$request['min'];
        
        $nowtime = Carbon::now();
        DB::table('store')
        ->where('id', $request['id'])
        ->update(['iteam_quantity' =>$nowitem,'Data_update_ID' =>$request['empID'],'updated_at' =>$nowtime]);
        return view('admin.store.success');
    }

    public function plus(Store  $store)
    {
        return view('admin.store.plus',['stores' => $store]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */

    
    public function UPplus(Request $request)
    {
        $store = DB::select('select * from store where id ='.$request['id']);
        foreach($store as $stores)
          {
            $nowitem=$stores->iteam_quantity;
            $maxque=$stores->iteam_max;
          }
          
          $validatedData = $request->validate([
            'plus'     => 'required|integer|min:0'

        ]);
        $nowitem=$nowitem+$request['plus'];
        if($nowitem>$maxque)
        {
            $message = 'Can;t add max >'.$maxque.' max '.$request['plus'];
            return redirect()->intended(route('admin.store.plus',$request['id']))->with('message', $message);
        }
        $nowtime = Carbon::now();
        DB::table('store')
        ->where('id', $request['id'])
        ->update(['iteam_quantity' =>$nowitem,'Data_update_ID' =>$request['empID'],'updated_at' =>$nowtime]);
        return view('admin.store.success');
    }

    public function update(Storeupdateval $request)
    {
        $store = DB::select('select * from store where id ='.$request['id']);
        
          foreach($store as $stores)
          {
              $iname=$stores->iteamname;
              $ique=$stores->iteam_quantity;
               $maxque=$stores->iteam_max;
                $minque=$stores->iteam_min;
                
              if((($iname==$request['name']) and ($ique==$request['quantity'])) and(($maxque==$request['max']) and ($minque==$request['min'])))
              {
              $message = 'Nothing to update';
              return redirect()->intended(route('admin.store.edit',[$stores->id]))->with('message', $message);
              }
              
          }
          if($request['max']<$request['min'])
          {
              $message = 'Item maximum size should be greater than minimum size';
              return redirect()->intended(route('admin.store.edit',[$stores->id]))->with('message', $message);
          }
        DB::table('store')
        ->where('id', $request['id'])
        ->update(['iteamname' => $request['name'],'iteam_quantity' =>$request['quantity'],'iteam_max' =>$request['max'],'iteam_min' =>$request['min'],'Data_update_ID' =>$request['empID']]);
        return view('admin.store.success');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store  $store)
    {
        return view('admin.store.delete',['stores' => $store]);
    }
    public function sedelete(Request $request)//Request $request, Employee $employee
    {
        DB::table('store')->where('id', $request['id'])->delete();
         return view('admin.store.success');
    }
    public function search(Request $request)//Request $request, Employee $employee
    {
        $store = DB::table('store')->where('id', $request['search'])->orWhere('iteamname', 'like', '%' . $request['search'] . '%')->get();

        return view('admin.store.index', compact('store'));

    }

    public function displayReport(Request $request)
    {
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');
        //$sortBy = $request->input('sort_by');

        $title = 'Store Report'; // Report title

        $meta = [ // For displaying filters description on header
            'Registered on' => $fromDate . ' To ' . $toDate,
          //  'Sort By' => $sortBy
        ];

        $queryBuilder = store::select('id', 'iteamname', 'iteam_quantity', 'company', 'iteam_max', 'iteam_min','quantity_type', 'pic','created_at') // Do some querying..
        ->whereBetween('created_at', [$fromDate, $toDate]);

        $columns = [ // Set Column to be displayed

            'Name' => 'iteamname',
            'Registered At' =>'created_at', // if no column_name specified, this will automatically seach for snake_case of column name (will be registered_at) column from query result
            'Quantity' => 'iteam_quantity',
            'Type' =>'quantity_type',
           // 'NIC' => 'nic'

        ];

        // Generate Report with flexibility to manipulate column class even manipulate column value (using Carbon, etc).
        return PdfReport::of($title, $meta, $queryBuilder, $columns)

            ->editColumns(['Registered At','Name','Quantity','Type'], [ // Mass edit column
                'class' => 'right '
            ])

            ->limit(20) // Limit record to be showed
            ->stream(); // other available method: download('filename') to download pdf / make() that will producing DomPDF / SnappyPdf instance so you could do any other DomPDF / snappyPdf method such as stream() or download()
    }


}

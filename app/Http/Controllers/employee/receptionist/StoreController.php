<?php

namespace App\Http\Controllers\employee\receptionist;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    public function store(Storeval $request)
    {
        $lastid=0;
        $em=$request->it_type;
        if($em=="")
        {
            $message = 'Nothig select in quantity type ';
            return redirect()->intended(route('admin.store.add'))->with('message', $message);
              
        }
        if($request['it_max']<$request['it_min'])
        {
            $message = 'Max < min ';
            return redirect()->intended(route('admin.store.add'))->with('message', $message);
        }

       $file=$request ->file('it_pic');
       
       $Store=Store::all();
       
       $type=$file->guessExtension();
       $lastid = 0;
        foreach($Store as $Stores)
        {
            $lastid=$Stores->id;
            
        }
        if ($lastid==0)
        {
            $lastid=0;
        }
        $lastid=$lastid+1;
        
        $name=$lastid."item.".$type;
        $file->move('image/store/item',$name);
        
        DB::insert('INSERT INTO `store` ( `iteamname`, `iteam_quantity`, `company`, `iteam_max`, `iteam_min`,`quantity_type`, `pic`) VALUES  (?, ?, ?, ?, ? ,?,?)',[$request['it_name'], $request['it_quantity'], $request['it_company'], $request['it_max'],$request['it_min'],$request['it_type'],$name]);
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
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
        ->update(['iteamname' => $request['name'],'iteam_quantity' =>$request['quantity'],'iteam_max' =>$request['max'],'iteam_min' =>$request['min']]);
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
}

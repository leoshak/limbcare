<?php

namespace App\Http\Controllers\Admin;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

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
    public function add()
    {
        return view('admin.store.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::insert('INSERT INTO `store` ( `iteamname`, `iteam_quantity`, `company`, `iteam_max`, `iteam_min`, `pic`) VALUES  (?, ?, ?, ?, ? ,?)',[$request['it_name'], $request['it_quantity'], $request['it_company'], $request['it_max'],$request['it_min'],$request['it_pic']]);
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
    public function update(Request $request)
    {
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

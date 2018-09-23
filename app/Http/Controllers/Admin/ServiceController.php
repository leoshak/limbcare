<?php

namespace App\Http\Controllers\Admin;
use Carbon\Carbon;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\Serviceval;
use App\Http\Requests\Storeupdateval;
use App\Http\Requests\Serviceupdateval;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceVal $request,Service $Services)
    {
        $em=$request->service_type;
        $name="panding";
        $up="0";
        $file=$request ->file('service_image');
       // DB::insert('INSERT INTO `limb-care`.`service` ( `serviceName`, `description`, `type`, `dataenterID`, `dataupdaterID`) VALUES ( ?, ?, ?, ? ,?)',
      //  [ $request['service_name'], $request['service_des'], $request['service_type'],$request['empID'],$request['it_type'],$up]);
        $Services->serviceName = $request->get('service_name');
        $Services->description = $request->get('service_des');
        $Services->type = $request->get('service_type');
        $Services->pic = $name;
        $Services->dataenterID=$request['empID'];
        $Services->$up;
        $Services->save();
        $serviceL = DB::select('select * from service ORDER BY id DESC LIMIT 1');
        $type=$file->guessExtension();
        $lastid = 0;
        foreach($serviceL as $serviceLs)
        {
            $lastid=$serviceLs->id;

        }
        $name=$lastid."item.".$type;
        $file->move('image/service/item',$name);
        $Services->pic=$name;
        $Services->save();
        return view('admin.services.success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $Service)
    {
        return view('admin.services.show',['Services' => $Service]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $Service)
    {
        return view('admin.services.edit',['Services' => $Service]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Serviceupdateval $request, Service $servicew)
    {
        $service = DB::select('select * from service where id ='.$request['id']);
        
          foreach($service as $services)
          {
              $sname=$services->serviceName;
              $sdes=$services->description;
                
              if(($sname==$request['name']) and ($sdes==$request['discription'])) 
              {
              $message = 'Nothing to update';
              return redirect()->intended(route('admin.services.edit',[$request->id]))->with('message', $message);
              }
          }
        //   $servicew->serviceName = $request->get('name');
        // $servicew->description = $request->get('discription');
        // $servicew->save();
        $nowtime = Carbon::now();
        DB::table('service')
            ->where('id', $request['id'])
            ->update(['serviceName' => $request['name'],'description' => $request['discription'],'dataupdaterID'=>$request['uid'],'updated_at'=>$nowtime]);
        return view('admin.services.success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        return view('admin.services.delete',['services' => $service]);
    }
    public function sedelete(Request $request)//Request $request, Employee $employee
    {
        DB::table('service')->where('id', $request['id'])->delete();
         return view('admin.services.success');
    }
    public function search(Request $request)//Request $request, Employee $employee
    {
        $services = DB::table('service')->where('id', $request['search'])->orWhere('serviceName', 'like', '%' . $request['search'] . '%')->get();
        
        return view('admin.services.index', compact('services'));
        
    }
}

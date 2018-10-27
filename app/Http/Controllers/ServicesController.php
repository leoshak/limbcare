<?php

namespace App\Http\Controllers;
use App\Models\Service;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function services() {
        $services = Service::all();
        
        return view('services',compact('services'));
    }
}

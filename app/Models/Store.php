<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table='store';
    protected $fillable=[
        'id', 'iteamname', 'iteam_quantity', 'company', 'iteam_max', 'iteam_min', 'pic'
    ];
}
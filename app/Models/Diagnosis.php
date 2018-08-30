<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    protected $table='diagnosis';
    protected $primarykey='id';
    protected $fillable=[
        'id', 'patientname', 'service', 'hight', 'weight', 'discription', 'skech', 'consultant_dr'
    ];
}

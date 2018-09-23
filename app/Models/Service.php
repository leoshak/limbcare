<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'service';

    protected $primarykey = 'id';
    protected $fillable = [
        'id', 'pic', 'serviceName', 'description', 'type','dataenterID', 'dataupdaterID'
    ];
}
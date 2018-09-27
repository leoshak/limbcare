<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $table='reply';
    protected $primaryKey = 'id';
    protected $fillable=[
        'id', 'replay', 'replay_pic', 'replier_ID','questionId'
    ];
}

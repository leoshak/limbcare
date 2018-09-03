<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $table = 'Income';

    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'amount'
    ];
}

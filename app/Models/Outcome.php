<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Outcome extends Model
{
    protected $table = 'Outcome';

    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'amount'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoice';

    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'amount','remaining_amount','patient_ID'
    ];
}

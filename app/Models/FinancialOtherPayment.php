<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinancialOtherPayment extends Model
{
    protected $table = 'otherpay';

    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'descrption', 'amount'
    ];
}

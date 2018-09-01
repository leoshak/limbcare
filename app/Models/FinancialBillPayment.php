<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinancialBillPayment extends Model
{
    protected $table = 'bill';

    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'patientname', 'descrption', 'amount'
    ];
}

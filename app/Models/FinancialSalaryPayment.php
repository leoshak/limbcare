<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinancialSalaryPayment extends Model
{
    protected $table = 'salarypay';

    protected $primaryKey = 'id';
    // protected $fillable = [
    //     'id', 'date', 'patientName', 'serviceType'
    // ];
    protected $fillable = [
        'id', 'emp_name', 'date', 'amount'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{    
    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'employees';

    protected $primarykey = 'id';
    protected $fillable = [
        'id', 'email', 'contactNo', 'nic', 'name', 'employeeType','emp_pic', 'address', 'birthday'
    ];

    public function scopeSearch($query, $key) {
        return $query->where('name', 'like', '%' .$key. '%')
                    ->orWhere('email', 'like', '%' .$key. '%')
                    ->orWhere('contactNo', 'like', '%' .$key. '%');
    }
}

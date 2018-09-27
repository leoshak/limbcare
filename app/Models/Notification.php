<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';

    protected $primarykey = 'id';
    protected $fillable = [
        'id', 'user_type','appointment_id', 'user_id', 'message', 'header', 'status','action', 'date', 'time'
    ];

    public function scopeSearch($query, $key) {
        return $query->where('user_type', 'like', '%' .$key. '%')
                    ->orWhere('user_id', 'like', '%' .$key. '%')
                    ->orWhere('message', 'like', '%' .$key. '%')
                    ->orWhere('header', 'like', '%' .$key. '%');
    }
}

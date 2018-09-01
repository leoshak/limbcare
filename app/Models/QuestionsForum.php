<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionsForum extends Model
{
    protected $table='queston';
    protected $fillable=[
        'id', 'Queston', 'replay1', 'replay2', 'replay3', 'replay4', 'replay5'
    ];
}

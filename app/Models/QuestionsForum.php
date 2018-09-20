<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionsForum extends Model
{
    protected $table='queston';
    protected $fillable=[
        'id', 'question_title', 'question_type', 'Queston', 'question_pic', 'replay1', 'replay1_pic', 'replay2', 'replay2_pic', 'replay3', 'replay3_pic', 'replay4', 'replay4_pic', 'replay5', 'replay5_pic'
    ];
}

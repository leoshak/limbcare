<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionsForum extends Model
{
    protected $table='question';
    protected $fillable=[
        'id', 'questionTitle', 'question', 'questionType', 'questionAsk', 'questionPic'
    ];
}

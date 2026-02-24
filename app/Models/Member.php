<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
    protected $fillable =[
        'id',
        'user_id',
        'left_at',
    ];
}

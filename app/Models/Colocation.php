<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Colocation extends Model
{
    protected $fillable = [
        'nom',
        'total_expense',
    ];
    //
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

 }

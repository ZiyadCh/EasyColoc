<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use users;

class Expense extends Model
{
    protected $fillable =[
        'id',
        'payeur',
        'montant',
        'categorie',
    ];
    public function user(): BelongsTo {
         return $this->belongsTo('users');
    }
}

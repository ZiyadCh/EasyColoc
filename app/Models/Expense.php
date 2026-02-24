<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use users;

class Expense extends Model
{
    protected $fillable =[
        'payeur',
        'montant',
        'categorie',
    ];
    /**
     * @return BelongsTo<users,Expense>
     */
    public function user(): BelongsTo {
         return $this->belongsTo('users');
    }
}

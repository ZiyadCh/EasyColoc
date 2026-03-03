<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use users;

class Expense extends Model
{
    protected $fillable = [
        'payeur',
        'montant',
        'category_id',
    ];
    /**
     * @return BelongsTo<users,Expense>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'payeur');
    }
    /**
     * @return BelongsTo<Colocation,Expense>
     */
    public function colocations(): BelongsTo
    {
        return $this->belongsTo(Colocation::class);
    }
    public function category()
    {
        return $this->hasOne(Categorie::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Colocation extends Model
{
    protected $fillable = [
        'nom',
        'total_expense',
    ];
    //
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
    /**
     * @return HasMany<Expense,Colocation>
     */
    public function expenses(): HasMany
    {
        return $this->hasMany(Expense::class);
    }


}

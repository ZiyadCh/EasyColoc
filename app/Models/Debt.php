<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Debt extends Model
{
    protected $table = "debt";

    protected $fillable = [
        'owned',
        'owns',
        'amount',
        'payed',
    ];

    /**
     * @return BelongsToMany<User,Debt,Pivot>
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}

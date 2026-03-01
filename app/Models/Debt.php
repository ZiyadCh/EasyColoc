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

    public function debtor()
    {
        return $this->belongsTo(User::class, 'owned');
    }

    public function creditor()
    {
        return $this->belongsTo(User::class, 'owns');
    }
}

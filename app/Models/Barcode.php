<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Barcode extends Model
{
    use HasFactory;

    protected $fillable = [
        "barcode"
    ];

    public function transections(): BelongsToMany
    {
        return $this->belongsToMany(Transaction::class);
    }

}

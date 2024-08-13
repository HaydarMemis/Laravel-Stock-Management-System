<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warehouse_Stock extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'pieces',
        'receipt_place',
        'issue_place',
        'report',
        'barcode',
    ];

    public function warehouse(): BelongsToMany
        {
            return $this ->belongsToMany(Warehouse::class);
        }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'pieecs',
        'receipt_place',
        'issue_place',
        'report',
    ];

    public function departments(): BelongsToMany
        {
            return $this ->belongsToMany(Department::class);
        }
}

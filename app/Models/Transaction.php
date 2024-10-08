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
        'pieces',
        'receipt_place',
        'issue_place',
        'report',
        'barcode',
    ];

    public function departments(): BelongsToMany
        {
            return $this ->belongsToMany(Department::class);
        }
        /**
         * The attributes that should be cast to native types.
         *
         * @var array
         */
        protected $casts = [
            'receipt_place' => 'json',
            'issue_place' => 'json',
        ];
}

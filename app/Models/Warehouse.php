<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warehouse extends Model
{
        use HasFactory,SoftDeletes;
        protected $fillable = [
            "name",
            "department_id"
        ];

        public function departments(): BelongsToMany
        {
            return $this->belongsToMany(Department::class);
        }


}

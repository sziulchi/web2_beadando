<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Driver extends Model
{
    protected $table = 'drivers';
    public $timestamps = false;

    protected $fillable = ['name', 'gender', 'birth_date', 'nationality'];

    public function results(): HasMany
    {
        return $this->hasMany(Result::class, 'did', 'id');
    }
}
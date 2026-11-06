<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $table = 'drivers';
    public $timestamps = false;

    protected $fillable = ['name', 'gender', 'birth_date', 'nationality'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gp extends Model
{
    protected $table = 'gps';
    protected $primaryKey = 'date';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['date', 'name', 'country'];
}

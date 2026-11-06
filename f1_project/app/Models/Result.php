<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Result extends Model
{
    protected $table = 'results';
    public $timestamps = false;

    protected $fillable = ['date', 'did', 'pos', 'error', 'team', 'type', 'engine'];

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class, 'did', 'id');
    }

    public function gp(): BelongsTo
    {
        return $this->belongsTo(Gp::class, 'date', 'date');
    }
}
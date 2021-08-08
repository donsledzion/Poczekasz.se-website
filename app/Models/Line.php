<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Line extends Model
{
    use HasFactory;

    protected $table = 'line_tables';

    public function tramevents() : HasMany
    {
        return $this->hasMany(TramEvent::class);
    }

    protected $fillable = [
        'line_name',
        'status',
    ];
}

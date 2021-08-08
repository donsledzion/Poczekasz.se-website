<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EventCategory extends Model
{
    use HasFactory;

    protected $table = 'tram_event_categories';

    public function tramevents(): HasMany
    {
        return $this->hasMany(TramEvent::class);
    }

    protected $fillable = [
        'name',
    ];
}

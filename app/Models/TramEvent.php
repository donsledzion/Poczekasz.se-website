<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TramEvent extends Model
{
    use HasFactory;
    protected $table = 'tramevents';


    protected function line(): BelongsTo {
        return $this->belongsTo(Line::class);
    }


    protected function eventcategory(): BelongsTo{
        return $this->belongsTo(EventCategory::class);
    }

    protected function author(): BelongsTo {
        return $this->belongsTo(User::class);
    }


    protected $fillable = [
        'image_path',
        'title',
        'author_id',
        'line_id',
        'eventcategory_id',
        'post_status',
    ];
}

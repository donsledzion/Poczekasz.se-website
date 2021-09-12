<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use phpDocumentor\Reflection\Types\Integer;

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

    public function StatusName(int $status) :string {
        // 0- wait to accept 1- accepted 2- denied 3- hidden 4-verification
        if($status==0){
            return "Oczekiwanie na akceptację";
        }
        if($status==1){
            return "Zaakceptowane";
        }
        if($status==2){
            return "Odrzucone";
        }
        if($status==3){
            return "Ukryte";
        }
        if($status==4){
            return "Na weryfikacji";
        }
    }

    public function isSelectedCategory(int $category_id){
        if($this->eventcategory_id == $category_id){
            return true;
        }
        return false;
    }
    public function isSelectedStatus(int $post_status){
        if($this->post_status == $post_status){
            return true;
        }
        return false;
    }
    public function isSelectedLine(int $line_id){
        if($this->line_id == $line_id){
            return true;
        }
        return false;
    }
}

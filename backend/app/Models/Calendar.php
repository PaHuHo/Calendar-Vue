<?php

namespace App\Models;

use App\Models\Events;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;
    protected $table="calendars";

    public function events()
    {
        return $this->belongsTo(Events::class,'event_id', 'id');
    }
}

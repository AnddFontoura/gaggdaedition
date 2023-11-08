<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Edition extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'banner',
        'description',
        'max_participants',
        'inscriptions_begins_at',
        'inscriptions_ends_at',
    ];
}

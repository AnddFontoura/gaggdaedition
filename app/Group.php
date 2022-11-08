<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public $fillable = [    
        'user_id',
        'group',
        'field',
        'group_position',
    ];

    public function userData()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}

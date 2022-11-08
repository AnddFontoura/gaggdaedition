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
        'points',
        'matches',
        'victories',
        'drawns',
        'defeats',
        'goals_scored',
        'goals_conceded',
        'red_card',
        'yellow_card',
    ];

    public function userData()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}

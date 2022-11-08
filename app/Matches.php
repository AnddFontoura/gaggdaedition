<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matches extends Model
{
    public $fillable = [
        'challenger_1',
        'challenger_2',
        'match_starts',
        'challenger_1_score',
        'challenger_2_score',
        'type',
    ];

    public function challenger1()
    {
        return $this->hasOne(Group::class, 'id', 'challenger_1');
    }

    public function challenger2()
    {
        return $this->hasOne(Group::class, 'id', 'challenger_2');
    }
}

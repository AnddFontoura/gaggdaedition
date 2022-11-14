<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Matches extends Model
{
    use SoftDeletes;
    
    public $fillable = [
        'challenger_1',
        'challenger_2',
        'match_number',
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

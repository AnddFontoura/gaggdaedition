<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MatchInfo extends Model
{
    use SoftDeletes;
    
    protected $table = "match_info";

    public $fillable = [
        'match_id',
        'group_id',
        'victories',
        'drawns',
        'defeats',
        'goals_scored',
        'goals_conceded',
        'red_card',
        'yellow_card',
    ];
}

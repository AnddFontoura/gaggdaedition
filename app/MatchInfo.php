<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchInfo extends Model
{
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

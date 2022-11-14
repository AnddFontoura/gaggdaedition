<?php

namespace App\Console\Commands;

use App\Group;
use App\Matches;
use App\MatchInfo;
use Illuminate\Console\Command;

class recalculateGroupsPointsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:recalculate-group-points';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Recalculate Points';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $group =  Group::get();
        $progressBar = $this->output->createProgressBar(count($group));
        $progressBar->start();

        foreach ($group as $player) {
            $playerId = $player->id;

            $matches = MatchInfo::where('group_id', $playerId)
                ->where('match_id', '<', 488)
                ->get();

            $points = 0;
            $goalsScored = 0;
            $goalsConceded = 0;
            $victories = 0;
            $defeats = 0;
            $drawns = 0;
            $redCards = 0;
            $yellowCards = 0;
            $matchesCount = 0;

            foreach($matches as $match) {
                if ($match->drawns == 1) {
                    $points += 1;
                }
                
                if ($match->victories == 1) {
                    $points += 3;
                }

                $goalsScored += $match->goals_scored;
                $goalsConceded += $match->goals_conceded;
                $victories += $match->victories;
                $defeats += $match->defeats;
                $drawns += $match->drawns;
                $redCards += $match->red_card;
                $yellowCards += $match->yellow_card;
                $matchesCount++;
            }

            $points -= $redCards;
            $points -= round($yellowCards/2, 0, PHP_ROUND_HALF_DOWN);

            $player->points = $points;
            $player->matches = $matchesCount;
            $player->victories = $victories;
            $player->drawns = $drawns; 
            $player->defeats = $defeats;
            $player->goals_scored = $goalsScored;
            $player->goals_conceded = $goalsConceded;
            $player->red_card = $redCards;
            $player->yellow_card = $yellowCards;
            $player->save();
            
            $progressBar->advance();
        }
        
        $progressBar->finish();
    }
}

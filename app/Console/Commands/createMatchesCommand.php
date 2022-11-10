<?php

namespace App\Console\Commands;

use App\Group;
use App\Matches;
use Carbon\Carbon;
use Illuminate\Console\Command;

class createMatchesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:create-matches';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the matches for this championship';

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
        Matches::whereNull('deleted_at')->delete();

        $duels = [
            1 => [
                [ 1, 2,],
                [ 3, 4,],
                [ 5, 6,],
            ],
            2 => [
                [ 1, 3,],
                [ 2, 5,],
                [ 4, 6,],
            ],
            3 => [
                [ 1, 5,],
                [ 2, 4,],
                [ 3, 6,],
            ],
            4 => [
                [ 1, 4,],
                [ 2, 6,],
                [ 3, 5,],
            ],
            5 => [
                [ 2, 3,],
                [ 4, 5,],
                [ 1, 6,],
            ],
        ];

        $groups = [
            'A',
            'C',
            'B',
            'D',
        ];

        $matchNumber = 1;

        for($d = 1; $d <= count($duels); $d++) {
            for($c = 0; $c < count($duels[$d]); $c++) {
                $challenger1_position = $duels[$d][$c]['0'];
                $challenger2_position = $duels[$d][$c]['1'];

                for($g = 0; $g < sizeof($groups); $g++) {
                    $groupName = $groups[$g];

                    $challenger_1 = $this->getChallengerInfo($groupName, $challenger1_position);
                    $challenger_2 = $this->getChallengerInfo($groupName, $challenger2_position);
                    
                    Matches::create([
                        'challenger_1' => $challenger_1->id,
                        'challenger_2' => $challenger_2->id,
                        'match_number' => $matchNumber,
                    ]);

                    $this->info('Criou partida número ' . $matchNumber);
                    $matchNumber++;
                }
            }
        }
    }

    protected function getChallengerInfo($groupName, $groupPosition) {
        return Group::where('group', $groupName)->where('group_position', $groupPosition)->first();
    }
}

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
        $groups = [
            'A',
            'B',
            'C',
            'D',
        ];

        $matchDuration = 6;

        foreach ($groups as $groupName) {
            if ($groupName == "A" || $groupName == "C") {
                $matchStart = new Carbon('2020-11-13 12:00');
            } else {
                $matchStart = new Carbon('2020-11-13 12:06');
            }
            
            $players = Group::where('group', $groupName)->get()->toArray();
            $playerCount = count($players);

            $progressBar = $this->output->createProgressBar($playerCount);
            $progressBar->start();

            for($i = 1; $i < 6; $i++) {
                for($p = 0; $p < $playerCount; $p++) {
                    $challenger_1_id = $players[$p]['id'];
                    
                    /* Calculo do Id */
                    $challenger2Id = $p + $i;
                    if ($challenger2Id >= 6) {
                        $challenger2Id -= 6;
                    }

                    $challenger_2_id = $players[$challenger2Id]['id'];
                    
                    $start = $matchStart->addMinutes($matchDuration)->format('H:i');

                    $match = Matches::create([
                        'challenger_1' => $challenger_1_id,
                        'challenger_2' => $challenger_2_id,
                        'match_starts' => $start
                    ]);
                }
                $progressBar->advance();
            }
            $progressBar->finish();
        }
    }
}

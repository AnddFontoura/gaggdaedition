<?php

namespace App\Console\Commands;

use App\Group;
use Illuminate\Console\Command;

class cleanGroupInformationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:clean-group-information';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        Group::whereNull('deleted_at')->update([
            'points' => 0,
            'matches' => 0,
            'victories' => 0,
            'drawns' => 0,
            'defeats' => 0,
            'goals_scored' => 0,
            'goals_conceded' => 0,
            'red_card' => 0,
            'yellow_card' => 0,
        ]);
    }
}

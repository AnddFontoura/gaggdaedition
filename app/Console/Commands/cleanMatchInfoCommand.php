<?php

namespace App\Console\Commands;

use App\MatchInfo;
use Illuminate\Console\Command;

class cleanMatchInfoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:clean-match-info';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean match info table';

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
        MatchInfo::whereNull('deleted_at')->delete();
    }
}

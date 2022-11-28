<?php

namespace App\Console\Commands;

use Dymantic\InstagramFeed\Profile;
use Illuminate\Console\Command;

class InstaFeedRefresh extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'instafeed:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is used to update the instafeeds at regular intervals for continous display on the homepage';

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
     * @return int
     */
    public function handle()
    {
        Profile::where('username','beautykink')->first()->refreshFeed(15);
        // })->twiceDaily();
    }
}

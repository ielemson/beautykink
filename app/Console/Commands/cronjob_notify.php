<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyCronJob;
class cronjob_notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email_notify:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command helps to notify me of the triggered cron job.';

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
        Mail::to('ielemson@gmail.com')->send(new NotifyCronJob());
    }
}

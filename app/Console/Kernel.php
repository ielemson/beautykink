<?php

namespace App\Console;

use Dymantic\InstagramFeed\Profile;
use Exception;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        // $schedule->command('instafeed:refresh')->hourly();

        try {   
            
        //     $schedule->call(function () {

        //     Profile::where('username', 'beautykink')->first()->refreshFeed(15);
        // })->everyMinute();

        $schedule->command('instafeed:refresh')->everyFourHours();
        $schedule->command('email_notify:cron')->everyFourHours();

            //code...
        } catch (Exception $e) {
            Log::error("Failed retrieving instagram feed", ['message' => $e->getMessage()]);
            //throw $th;
        }

        $schedule->command('instagram-feed:refresh-tokens')->monthlyOn(15, '03:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}

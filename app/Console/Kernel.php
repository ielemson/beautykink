<?php

namespace App\Console;

use Dymantic\InstagramFeed\Profile;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

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
        // $schedule->call( function(){
        //     Profile::where('username','beautykink')->first()->refreshFeed(15);
        // })->twiceDaily();
        $schedule->command('instafeed:refresh')
        ->hourly();
        $schedule->command('instagram-feed:refresh-tokens')->monthlyOn(15,'03:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

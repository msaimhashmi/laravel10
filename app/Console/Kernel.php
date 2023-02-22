<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    // here is the example below
        /**
         * Define the application's command schedule.
         */
        protected function schedule(Schedule $schedule): void
        {
            // $schedule->command('inspire')->hourly();
        }
    // example end


    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

<?php

namespace App\Console;

use App\Http\Controllers\Admin\ParserController;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        /*
        Необходимо добавить ежеминутный CRON какого вида:
        * * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
        */
        $schedule->call(new ParserController)->everyTenSeconds();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

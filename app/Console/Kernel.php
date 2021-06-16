<?php

namespace App\Console;

use App\Console\Commands\ActivationBonusCommand;
use App\Console\Commands\BackupCommand;
use App\Console\Commands\CheckForSocialBonusCommand;
use App\Console\Commands\CorrectPassiveToActiveCommand;
use App\Console\Commands\UnitTestCommand;
use App\Models\Fond;
use App\Models\Operation;
use App\Models\UserOperation;
use App\Models\Users;
use App\Models\UserStatus;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'App\Console\Commands\GlobalBonusBeginOfMonth',
        'App\Console\Commands\UserPacketSetPaid',
        ActivationBonusCommand::class,
        UnitTestCommand::class,
        BackupCommand::class,
        CorrectPassiveToActiveCommand::class,
        CheckForSocialBonusCommand::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('globalBonus:everyMonth')
            ->everyMinute();
        $schedule->command('make:backup')
            ->daily();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}

<?php

declare(strict_types=1);

namespace App\Console;

use App\Coinbase\Actions\SendCoinbaseEmailAction;
use App\Coinbase\Commands\SendMailCommand;
use Domain\Coinbase\UseCases\SendMailUseCase;
use Illuminate\Console\Scheduling\Schedule;
use Laravel\Lumen\Console\Kernel as ConsoleKernel;

final class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array<class-string|string>
     */
    protected $commands = [
        SendMailCommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('send:mail')->dailyAt(config('mail.schedule_at'));

        if (config('ovh.scheduler_workaround_enabled')) {
            $this->scheduleRunsHourly($schedule);
        }
    }

    /**
     * Workaround for OVH server.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     *
     * @return void
     */
    private function scheduleRunsHourly(Schedule $schedule): void
    {
        foreach ($schedule->events() as $event) {
            $event->expression = substr_replace($event->expression, '*', 0, 1);
        }
    }
}

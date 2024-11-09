<?php

declare(strict_types=1);

use App\Commands\SendMailCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\{Exceptions, Middleware};

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withCommands([
        SendMailCommand::class,
    ])
    ->withSchedule(static function (Schedule $schedule): void {
        $schedule->command('send:mail')->dailyAt(config('mail.schedule_at'));

        if (config('ovh.scheduler_workaround_enabled')) {
            foreach ($schedule->events() as $event) {
                $event->expression = substr_replace($event->expression, '*', 0, 1);
            }
        }
    })
    ->withMiddleware(static function (Middleware $middleware): void {})
    ->withExceptions(static function (Exceptions $exceptions): void {})
    ->create();

<?php

declare(strict_types=1);

namespace App\Coinbase\Commands;

use App\Coinbase\Actions\SendCoinbaseEmailAction;
use Illuminate\Console\Command;

final class SendMailCommand extends Command
{
    /** @var string */
    protected $signature = 'send:mail';

    /** @var string */
    protected $description = 'Send Coinbase daily report';

    public function handle(): void
    {
        (new SendCoinbaseEmailAction())->__invoke();
    }
}

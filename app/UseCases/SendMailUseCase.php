<?php

declare(strict_types=1);

namespace App\UseCases;

use App\Mails\DailyReportMail;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use SensitiveParameter;

final class SendMailUseCase
{
    /** @param \Illuminate\Support\Collection<int, object{wallet: \Coinbase\Wallet\Resource\Account, total: string}> $accounts */
    public function __invoke(
        #[SensitiveParameter]
        Collection $accounts,
    ): void {
        $message = $this->establishMessage($accounts);

        $this->sendMessage($message);
    }

    private function sendMessage(string $message): void
    {
        Mail::to(config('mail.from.to'))->send(
            new DailyReportMail($message),
        );
    }

    /** @param \Illuminate\Support\Collection<int, object{wallet: \Coinbase\Wallet\Resource\Account, total: string}> $wallets */
    private function establishMessage(Collection $wallets): string
    {
        $message = '';

        foreach ($wallets as $item) {
            /** @var array{color: string, code: string} $currency */
            $currency = $item->wallet->getCurrency();

            $message .= sprintf(
                '<p style="color: %s">%s: %s €</p>',
                $currency['color'],
                $currency['code'],
                $item->total,
            );
        }

        $message .= sprintf(
            '<h3>Total: %s €</h3>',
            $wallets->sum('total'),
        );

        return $message;
    }
}

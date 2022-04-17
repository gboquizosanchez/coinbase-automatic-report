<?php

declare(strict_types=1);

namespace Domain\Coinbase\UseCases;

use App\Coinbase\Mails\DailyReportMail;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Collection;

final class SendMailUseCase
{
    private Mailer $mailer;

    public function __construct()
    {
        $this->mailer = app(Mailer::class);
    }

    public function execute(Collection $accounts): void
    {
        $message = $this->establishMessage($accounts);

        $this->sendMessage($message);
    }

    private function sendMessage(string $message): void
    {
        $this->mailer->to('xekevara@gmail.com')->send(
            new DailyReportMail($message),
        );
    }

    private function establishMessage(Collection $accounts): string
    {
        $message = '';

        /** @var \Coinbase\Wallet\Resource\Account $account */
        foreach ($accounts as $account) {
            $currency = $account->getCurrency();

            $message .= sprintf(
                '<p style="color: %s">%s: %s €</p>',
                $currency['color'],
                $currency['code'],
                $account->totalPrice,
            );
        }

        $message .= sprintf(
            '<h3>Total: %s €</h3>',
            $accounts->sum('totalPrice'),
        );

        return $message;
    }
}

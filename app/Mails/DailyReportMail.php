<?php

declare(strict_types=1);

namespace App\Mails;

use Illuminate\Mail\Mailable;
use Illuminate\Support\Carbon;

final class DailyReportMail extends Mailable
{
    public function __construct(
        private readonly string $message,
    ) {
        $this->subject = sprintf(
            'Daily Report %s',
            Carbon::now()->isoFormat('LLLL'),
        );
    }

    public function build(): self
    {
        return $this->from(config('mail.from.address'))
            ->subject($this->subject)
            ->with('report', $this->message)
            ->view('mail');
    }
}

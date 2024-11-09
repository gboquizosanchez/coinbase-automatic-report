<?php

declare(strict_types=1);

namespace App\UseCases;

use App\Services\Coinbase;

final class FetchPriceRateUseCase
{
    public function __invoke(string $currency): string | null
    {
        $exchange = "{$currency}-EUR";

        return Coinbase::client()->getSpotPrice($exchange)?->getAmount();
    }
}

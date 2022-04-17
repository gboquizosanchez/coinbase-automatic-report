<?php

declare(strict_types=1);

namespace Domain\Coinbase\UseCases;

use Coinbase\Wallet\Client;
use Domain\Coinbase\Services\CoinbaseService;

final class FetchPriceRateUseCase
{
    private Client $client;

    public function __construct()
    {
        $this->client = (new CoinbaseService())->client();
    }

    public function execute(string $currency): ?string
    {
        return $this->client->getSpotPrice("$currency-EUR")?->getAmount();
    }
}


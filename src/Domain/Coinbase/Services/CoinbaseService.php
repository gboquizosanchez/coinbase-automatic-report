<?php

declare(strict_types=1);

namespace Domain\Coinbase\Services;

use Coinbase\Wallet\Client;
use Coinbase\Wallet\Configuration;

final class CoinbaseService
{
    private Client $client;

    public function __construct()
    {
        [$key, $secretKey] = array_values(config('coinbase'));

        $configuration = Configuration::apiKey($key, $secretKey);

        $this->client = Client::create($configuration);
    }

    public function client(): Client
    {
        return $this->client;
    }
}

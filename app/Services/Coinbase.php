<?php

declare(strict_types=1);

namespace App\Services;

use Coinbase\Wallet\{
    Client,
    Configuration,
};

final class Coinbase
{
    private Client $client;

    public function __construct()
    {
        $key = config('coinbase.api_key');

        $secretKey = config('coinbase.secret_api_key');

        $configuration = Configuration::apiKey($key, $secretKey);

        $this->client = Client::create($configuration);
    }

    public static function client(): Client
    {
        return (new self())->client;
    }
}

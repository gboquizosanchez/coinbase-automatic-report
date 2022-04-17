<?php

declare(strict_types=1);

namespace Domain\Coinbase\UseCases;

use Coinbase\Wallet\Client;
use Coinbase\Wallet\Enum\Param;
use Coinbase\Wallet\Resource\Account;
use Domain\Coinbase\Services\CoinbaseService;
use Illuminate\Support\Collection;

final class FetchAccountsUseCase
{
    private Client $client;

    public function __construct()
    {
        $this->client = (new CoinbaseService())->client();
    }

    public function execute(): Collection
    {
        $accounts = $this->client->getAccounts([
            Param::FETCH_ALL => true,
        ]);

        return collect($accounts)
            ->filter($this->emptyAccounts(...))
            ->values();
    }

    private function emptyAccounts(Account $account): bool
    {
        return $account->getBalance()->getAmount() > 0;
    }
}


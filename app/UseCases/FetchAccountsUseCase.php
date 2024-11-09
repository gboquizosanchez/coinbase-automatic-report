<?php

declare(strict_types=1);

namespace App\UseCases;

use App\Services\Coinbase;
use Coinbase\Wallet\Enum\Param;
use Coinbase\Wallet\Resource\Account;
use Illuminate\Support\Collection;
use SensitiveParameter;

final class FetchAccountsUseCase
{
    /** @return \Illuminate\Support\Collection<int, \Coinbase\Wallet\Resource\Account> */
    public function __invoke(): Collection
    {
        return collect($this->retrieveAccounts())
            ->ensure(Account::class)
            ->filter($this->emptyAccounts(...))
            ->values();
    }

    /** @return \Coinbase\Wallet\Resource\Account[] $accounts */
    private function retrieveAccounts(): array
    {
        return Coinbase::client()
            ->getAccounts([
                Param::FETCH_ALL => true,
            ])
            ->all();
    }

    private function emptyAccounts(
        #[SensitiveParameter]
        Account $account,
    ): bool {
        return $account->getBalance()->getAmount() > 0;
    }
}

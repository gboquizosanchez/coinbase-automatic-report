<?php

declare(strict_types=1);

namespace App\Coinbase\Transformers;

use Coinbase\Wallet\Resource\Account;
use Domain\Coinbase\UseCases\FetchPriceRateUseCase;
use Illuminate\Support\Collection;

final class AccountTransformer
{
    private FetchPriceRateUseCase $fetchPriceRateUseCase;

    public function __construct()
    {
        $this->fetchPriceRateUseCase = new FetchPriceRateUseCase();
    }

    public function transform(Collection $accounts): Collection
    {
        return $accounts
            ->transform($this->calculate(...))
            ->sortByDesc('totalPrice')
            ->values();
    }

    private function calculate(Account $account): Account
    {
        $balance = $account->getBalance();

        $rate = $this->fetchPriceRateUseCase->execute(
            $balance->getCurrency()
        );

        $account->totalPrice = number_format($rate * $balance->getAmount(), 2);

        return $account;
    }
}

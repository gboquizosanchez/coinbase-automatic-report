<?php

declare(strict_types=1);

namespace App\Transformers;

use App\UseCases\FetchPriceRateUseCase;
use Coinbase\Wallet\Resource\Account;
use Illuminate\Support\{
    Collection,
    Number,
};
use SensitiveParameter;

final class AccountTransformer
{
    /**
     * @param \Illuminate\Support\Collection<int, \Coinbase\Wallet\Resource\Account> $accounts
     *
     * @return \Illuminate\Support\Collection<int, object{wallet: \Coinbase\Wallet\Resource\Account, total: string}>
     */
    public function transform(
        #[SensitiveParameter]
        Collection $accounts,
    ): Collection {
        return $accounts
            ->map($this->calculate(...))
            ->sortByDesc('total')
            ->values();
    }

    /** @return object{wallet: \Coinbase\Wallet\Resource\Account, total: string} */
    private function calculate(
        #[SensitiveParameter]
        Account $account,
    ): object {
        $balance = $account->getBalance();

        $rate = (new FetchPriceRateUseCase())($balance->getCurrency());

        $total = $rate * $balance->getAmount();

        return (object) [
            'wallet' => $account,
            'total' => (string) Number::format($total, precision: 2),
        ];
    }
}

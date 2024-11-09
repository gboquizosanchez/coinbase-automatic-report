<?php

declare(strict_types=1);

namespace App\Actions;

use App\Transformers\AccountTransformer;
use App\UseCases\{
    FetchAccountsUseCase,
    SendMailUseCase,
};
use Exception;
use Illuminate\Http\JsonResponse;

final class SendCoinbaseEmailAction
{
    public function __invoke(): JsonResponse
    {
        try {
            $accounts = (new FetchAccountsUseCase())();

            $results = (new AccountTransformer())->transform($accounts);

            (new SendMailUseCase())($results);

            return new JsonResponse([
                'success' => true,
                'message' => 'Sent!',
            ]);
        } catch (Exception $exception) {
            return new JsonResponse([
                'success' => false,
                'message' => $exception->getMessage(),
            ]);
        }
    }
}

<?php

declare(strict_types=1);

namespace App\Coinbase\Actions;

use App\Coinbase\Transformers\AccountTransformer;
use Domain\Coinbase\UseCases\FetchAccountsUseCase;
use Domain\Coinbase\UseCases\SendMailUseCase;
use Illuminate\Http\JsonResponse;
use Support\Controller;

final class SendCoinbaseEmailAction extends Controller
{
    public function __invoke(
        SendMailUseCase $sendMailUseCase,
    ): JsonResponse {
        try {
            $accounts = (new FetchAccountsUseCase())->execute();

            $accounts = (new AccountTransformer())->transform($accounts);

            $sendMailUseCase->execute($accounts);
        } catch (\Exception $exception) {
            return new JsonResponse([
                'success' => false,
                'message' => $exception->getMessage(),
            ]);
        }

        return new JsonResponse(['success' => true, 'message' => 'Sent!']);
    }
}

<?php

declare(strict_types=1);

use App\Actions\SendCoinbaseEmailAction;
use Illuminate\Support\Facades\Route;

Route::get('sandbox', static fn() => (new SendCoinbaseEmailAction())());

Route::get('/', static fn() => Route::getFacadeApplication()?->version());

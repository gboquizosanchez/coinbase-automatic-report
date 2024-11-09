<?php

declare(strict_types=1);

it('is alive', function (): void {
    expect($this->get('/')->getContent())
        ->toBe($this->app->version());
});

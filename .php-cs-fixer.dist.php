<?php

declare(strict_types=1);

use PhpCsFixer\{
    Config,
    Finder,
};
use PhpCsFixer\Runner\Parallel\ParallelConfigFactory;

return (new Config())
    ->setParallelConfig(
        ParallelConfigFactory::detect(),
    )
    ->setRules([
        '@PER-CS2.0' => true,
    ])
    ->setFinder(
        (new Finder())
            ->in(__DIR__)
            ->exclude('packages'),
    );

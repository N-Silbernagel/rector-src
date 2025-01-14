<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Tests\Renaming\Rector\Name\RenameClassRector\Source\NewClass;
use Rector\Tests\Renaming\Rector\Name\RenameClassRector\Source\OldClass;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig
        ->ruleWithConfiguration(RenameClassRector::class, [
            OldClass::class => NewClass::class,
        ]);

    // skip the path after defined
    $rectorConfig->skip([
        RenameClassRector::class => [sys_get_temp_dir() . '/rector/tests_fixture_'],
    ]);
};

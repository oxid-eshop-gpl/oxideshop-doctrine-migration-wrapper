<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace OxidEsales\DoctrineMigrationWrapper;

$autoloadFileExist = false;
$autoloadFiles = [
    __DIR__ . '/vendor/autoload.php',
    __DIR__ . '/../vendor/autoload.php',
    __DIR__ . '/../../vendor/autoload.php',
    __DIR__ . '/../../../vendor/autoload.php',
    __DIR__ . '/../../../../vendor/autoload.php',
];

foreach ($autoloadFiles as $autoloadFile) {
    if (file_exists($autoloadFile)) {
        require_once $autoloadFile;
        $autoloadFileExist = true;
        break;
    }
}

if (!$autoloadFileExist) {
    exit('Autoload file was not found!');
}

$migrationsBuilder = new \OxidEsales\DoctrineMigrationWrapper\MigrationsBuilder();
$migrations = $migrationsBuilder->build();

$args = $migrations->prepareArgumentsForMigration($argv);

exit($migrations->execute($args['command'], $args['edition'], $args['flags']));

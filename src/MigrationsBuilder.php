<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace OxidEsales\DoctrineMigrationWrapper;

use OxidEsales\Facts\Facts;

class MigrationsBuilder
{
    /**
     * @return Migrations
     */
    public function build(Facts $facts = null)
    {
        $doctrineApplicationBuilder = new DoctrineApplicationBuilder();

        if (!$facts) {
            $facts = new Facts();
        }

        $dbFilePath = __DIR__ . DIRECTORY_SEPARATOR . 'migrations-db.php' ;

        $migrationAvailabilityChecker = new MigrationAvailabilityChecker();

        return new Migrations($doctrineApplicationBuilder, $facts, $dbFilePath, $migrationAvailabilityChecker);
    }
}

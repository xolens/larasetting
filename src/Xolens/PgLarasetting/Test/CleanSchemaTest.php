<?php

namespace Xolens\PgLarasetting\Test;

use DB;
use Xolens\PgLarautil\Test\CleanSchemaBase;

final class ResetMigrationTest extends CleanSchemaBase
{
    protected function getPackageProviders($app): array{
        return [
            'Xolens\PgLarautil\PgLarautilServiceProvider',
            'Xolens\PgLarasetting\PgLarasettingServiceProvider'
        ];
    }
}


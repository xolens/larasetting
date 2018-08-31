<?php

namespace Xolens\PgLarasetting\Test\Repository;

use Xolens\PgLarasetting\App\Repository\DomainRepository;
use Xolens\PgLarasetting\App\Model\Domain;

class RepositoryTestBase extends \Orchestra\Testbench\TestCase
{
    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate');
    }
    protected function getPackageProviders($app)
    {
        return [
            'Xolens\PgLarasetting\PgLarasettingServiceProvider',
            'Xolens\PgLarautil\PgLarautilServiceProvider'
        ];
    }
    
}
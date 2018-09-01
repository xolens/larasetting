<?php

namespace Xolens\PgLarasetting\Test;

use DB;
use \Orchestra\Testbench\TestCase;

final class ResetMigrationTest extends TestCase
{

    protected function getPackageProviders($app): array{
        return [
            'Xolens\PgLarautil\PgLarautilServiceProvider',
            'Xolens\PgLarasetting\PgLarasettingServiceProvider'
        ];
    }
    protected function setUp(): void{
        parent::setUp();
        DB::statement("DROP SCHEMA IF EXISTS public CASCADE");
        DB::statement("CREATE SCHEMA public AUTHORIZATION minefopstat;");
        $this->artisan('migrate');
    }

    /**
     * @test
     */
    public function reset(){
        $this->assertTrue(true);
    }
}
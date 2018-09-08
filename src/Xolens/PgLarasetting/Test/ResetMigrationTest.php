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
        $shema = DB::select("SELECT current_schema()")["0"]->current_schema;
        if($shema!=null){
            DB::statement("DROP SCHEMA IF EXISTS ".$shema." CASCADE");
        }else{
            $shema = "public";
        }
        DB::statement("CREATE SCHEMA ".$shema.";");
        $this->artisan('migrate');
    }

    /**
     * @test
     */
    public function reset(){
        $this->assertTrue(true);
    }
}
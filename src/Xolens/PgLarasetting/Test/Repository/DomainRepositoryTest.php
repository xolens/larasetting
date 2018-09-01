<?php

namespace Xolens\PgLarasetting\Test\Repository;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

use Xolens\PgLarasetting\App\Repository\DomainRepository;
use Xolens\PgLarasetting\App\Model\Domain;

use Xolens\LarautilContract\App\Util\Model\Sorter;
use Xolens\LarautilContract\App\Util\Model\Filterer;

final class DomainRepositoryTest extends TestPgLaraSettingBase
{
    /**
     * Setup the test environment.
     */
    protected function setUp(): void{
        parent::setUp();
        $this->artisan('migrate');
        $repo = new DomainRepository();
        $this->repo = $repo;
    }

    /**
     * @test
     */
    public function test_make(){
        $i = rand(0, 10000);
        $item = $this->repository()->make([
            "table_name"=> "table_name".$i,
            "model"=> "model".$i,
        ]);
        $this->assertTrue(true);
    }
    
    /** HELPERS FUNCTIONS --------------------------------------------- **/

    public function generateSorter(){
        $sorter = new Sorter();
        $sorter->asc('table_name')
                ->asc('model');
        return $sorter;
    }

    public function generateFilterer(){
        $filterer = new Filterer();
        $filterer->between('id',[0,14])
                ->like('table_name','%tab%');
        return $filterer;
    }

    public function generateItems($toGenerateCount){
        $count = $this->repository()->count()->response();
        $generatedItemsId = [];
        
        for($i=$count; $i<($toGenerateCount+$count); $i++){
            $tableName = "pglarasetting_domain_repo_test_table".$i;
            if (!Schema::hasTable($tableName)) {
                Schema::create($tableName, function (Blueprint $table) {
                    $table->increments('id');
                    $table->string('col1', 40)->nullable();
                    $table->timestamps();
                });
            }
            $item = $this->repository()->create([
                "table_name"=> $tableName,
                "model"=> "model".$i,
            ]);
            $generatedItemsId[] = $item->response()->id;
        }
        $this->assertEquals(count($generatedItemsId), $toGenerateCount);
        return $generatedItemsId;
    }
}
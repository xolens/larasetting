<?php

namespace Xolens\PgLarasetting\Test\Repository;

use Xolens\PgLarasetting\App\Repository\SettingRepository;
use Xolens\PgLarasetting\App\Model\Setting;

use Xolens\LarautilContract\App\Util\Model\Sorter;
use Xolens\LarautilContract\App\Util\Model\Filterer;


final class SettingRepositoryTest extends TestPgLaraSettingBase
{
    /**
     * Setup the test environment.
     */
    protected function setUp(): void{
        parent::setUp();
        $this->artisan('migrate');
        $repo = new SettingRepository();
        $this->repo = $repo;
    }

    /**
     * @test
     */
    public function test_make(){
        $trueInt = rand(1,2);
        $i = rand(0, 10000);
        $item = $this->repository()->make([
            "name"=> "name".$i,
            "value"=> "value".$i,
            "public"=> $trueInt==1,
        ]);
        $this->assertTrue(true);
    }
    
    /** HELPERS FUNCTIONS --------------------------------------------- **/

    public function generateSorter(){
        $sorter = new Sorter();
        $sorter->asc('name')
                ->asc('value');
        return $sorter;
    }

    public function generateFilterer(){
        $filterer = new Filterer();
        $filterer->between('id',[0,14])
                ->like('name','%tab%');
        return $filterer;
    }

    public function generateItems($toGenerateCount){
        $count = $this->repository()->count()->response();
        $generatedItemsId = [];
        
        for($i=$count; $i<($toGenerateCount+$count); $i++){
            $trueInt = rand(1,2);
            $item = $this->repository()->create([
                "name"=> "name".$i,
                "value"=> "value".$i,
                "public"=> $trueInt==1,
            ]);
            $generatedItemsId[] = $item->response()->id;
        }
        $this->assertEquals(count($generatedItemsId), $toGenerateCount);
        return $generatedItemsId;
    }
}
<?php

namespace Xolens\PgLarasetting\Test\Repository;

use Xolens\PgLarasetting\App\Repository\PreferenceRepository;
use Xolens\PgLarasetting\App\Repository\DomainRepository;
use Xolens\PgLarasetting\App\Model\Preference;

use Xolens\PgLarautil\App\Util\Model\Sorter;
use Xolens\PgLarautil\App\Util\Model\Filterer;

final class PreferenceRepositoryTest extends TestPgLaraSettingBase
{
    protected $domainRepo;
    /**
     * Setup the test environment.
     */
    protected function setUp(): void{
        parent::setUp();
        $this->artisan('migrate');
        $repo = new PreferenceRepository();
        $this->domainRepo = new DomainRepository();
        $this->repo = $repo;
    }

    /**
     * @test
     */
    public function test_make(){
        $i = rand(0, 10000);
        $item = $this->repository()->make([
            "name"=> "name".$i,
            "description"=> "description".$i,
            "default"=> "default".$i,
            "domain_id"=> $i,
        ]);
        $this->assertTrue(true);
    }
    
    /** HELPERS FUNCTIONS --------------------------------------------- **/

    public function generateSorter(){
        $sorter = new Sorter();
        $sorter->asc('name')
                ->asc('description');
        return $sorter;
    }

    public function generateFilterer(){
        $filterer = new Filterer();
        $filterer->between('id',[0,14])
                ->like('name','%me%');
        return $filterer;
    }

    public function generateItems($toGenerateCount){
        $count = $this->repository()->count()->response();
        $generatedItemsId = [];
        
        for($i=$count; $i<($toGenerateCount+$count); $i++){
            $domainId = $this->domainRepo->model()::inRandomOrder()->first()->id;
            $item = $this->repository()->create([
                "name"=> "name".$i,
                "description"=> "description".$i,
                "default"=> "default".$i,
                "domain_id"=> $domainId,
            ]);
            $generatedItemsId[] = $item->response()->id;
        }
        $this->assertEquals(count($generatedItemsId), $toGenerateCount);
        return $generatedItemsId;
    }
}
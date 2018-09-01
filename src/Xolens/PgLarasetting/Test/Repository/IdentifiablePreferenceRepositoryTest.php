<?php

namespace Xolens\PgLarasetting\Test\Repository;

use Xolens\PgLarasetting\App\Repository\IdentifiablePreferenceRepository;
use Xolens\PgLarasetting\App\Repository\PreferenceRepository;
use Xolens\PgLarasetting\App\Model\IdentifiablePreference;

use Xolens\LarautilContract\App\Util\Model\Sorter;
use Xolens\LarautilContract\App\Util\Model\Filterer;

final class IdentifiablePreferenceRepositoryTest extends TestPgLaraSettingBase
{
    protected $preferenceRepo;
    /**
     * Setup the test environment.
     */
    protected function setUp(): void{
        parent::setUp();
        $this->artisan('migrate');
        $repo = new IdentifiablePreferenceRepository();
        $this->preferenceRepo = new PreferenceRepository();
        $this->repo = $repo;
    }

    /**
     * @test
     */
    public function test_make(){
        $i = rand(0, 10000);
        $item = $this->repository()->make([
            "preference_value"=> "preference_value".$i,
            "identifiable_model"=> "identifiable_model".$i,
            "identifiable_id"=> "identifiable_id".$i,
            "identifiable_id"=> $i,
            "preference_id"=> $i,
        ]);
        $this->assertTrue(true);
    }
    
    /** HELPERS FUNCTIONS --------------------------------------------- **/

    public function generateSorter(){
        $sorter = new Sorter();
        $sorter->asc('preference_value')
                ->asc('identifiable_id');
        return $sorter;
    }

    public function generateFilterer(){
        $filterer = new Filterer();
        $filterer->between('id',[0,14])
                ->like('preference_value','%val%');
        return $filterer;
    }

    public function generateItems($toGenerateCount){
        $count = $this->repository()->count()->response();
        $generatedItemsId = [];
        
        for($i=$count; $i<($toGenerateCount+$count); $i++){
            $preferenceId = $this->preferenceRepo->model()::inRandomOrder()->first()->id;
            $item = $this->repository()->create([
                "preference_value"=> "preference_value".$i,
                "identifiable_model"=> "identifiable_model".$i,
                "identifiable_id"=> "identifiable_id".$i,
                "identifiable_id"=> $i,
                "preference_id"=> $preferenceId,
            ]);
            $generatedItemsId[] = $item->response()->id;
        }
        $this->assertEquals(count($generatedItemsId), $toGenerateCount);
        return $generatedItemsId;
    }
}
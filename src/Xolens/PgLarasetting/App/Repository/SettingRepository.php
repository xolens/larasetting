<?php

namespace Xolens\PgLarasetting\App\Repository;

use Xolens\PgLarasetting\App\Model\Setting;
use Xolens\LarasettingContract\App\Repository\Contract\SettingRepositoryContract;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;

class SettingRepository extends AbstractWritableRepository implements SettingRepositoryContract
{
    public function model(){
        return Setting::class;
    }
    
}
<?php

namespace Xolens\PgLarasetting\App\Repository;

use Xolens\PgLarasetting\App\Model\Setting;
use SettingManagementContract\Repository\SettingRepoContract;

class SettingRepository implements SettingRepoContract
{
    public static function model(){
        return Setting::class;
    }
    
}
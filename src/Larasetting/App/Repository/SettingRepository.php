<?php

namespace Xolens\Larasetting\App\Repository;

use Xolens\Larasetting\App\Model\Setting;
use SettingManagementContract\Repository\SettingRepoContract;

class SettingRepository implements SettingRepoContract
{
    public static function model(){
        return Setting::class;
    }
    
}
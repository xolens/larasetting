<?php

namespace Xolens\PgLarasetting\App\Repository;

use Xolens\PgLarasetting\App\Model\Preference;
use SettingManagementContract\Repository\PreferenceRepoContract;

class PreferenceRepository implements PreferenceRepoContract
{
    public static function model(){
        return Preference::class;
    }
    
}
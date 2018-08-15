<?php

namespace Xolens\Larasetting\App\Repository;

use Xolens\Larasetting\App\Model\Preference;
use SettingManagementContract\Repository\PreferenceRepoContract;

class PreferenceRepository implements PreferenceRepoContract
{
    public static function model(){
        return Preference::class;
    }
    
}
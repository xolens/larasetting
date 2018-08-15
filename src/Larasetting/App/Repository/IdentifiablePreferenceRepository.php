<?php

namespace Xolens\Larasetting\App\Repository;

use Xolens\Larasetting\App\Model\IdentifiablePreference;
use SettingManagementContract\Repository\IdentifiablePreferenceRepoContract;

class IdentifiablePreferenceRepository implements IdentifiablePreferenceRepoContract
{
    public static function model(){
        return IdentifiablePreference::class;
    }
    
}
<?php

namespace Xolens\PgLarasetting\App\Repository;

use Xolens\PgLarasetting\App\Model\IdentifiablePreference;
use SettingManagementContract\Repository\IdentifiablePreferenceRepoContract;

class IdentifiablePreferenceRepository implements IdentifiablePreferenceRepoContract
{
    public static function model(){
        return IdentifiablePreference::class;
    }
    
}
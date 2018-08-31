<?php

namespace Xolens\PgLarasetting\App\Repository;

use Xolens\PgLarasetting\App\Model\EnumGroup;
use SettingManagementContract\Repository\EnumGroupRepoContract;

class EnumGroupRepository implements EnumGroupRepoContract
{
    public static function model(){
        return EnumGroup::class;
    }
    
}
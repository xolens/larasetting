<?php

namespace Xolens\Larasetting\App\Repository;

use Xolens\Larasetting\App\Model\EnumGroup;
use SettingManagementContract\Repository\EnumGroupRepoContract;

class EnumGroupRepository implements EnumGroupRepoContract
{
    public static function model(){
        return EnumGroup::class;
    }
    
}
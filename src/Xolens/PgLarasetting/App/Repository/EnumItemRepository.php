<?php

namespace Xolens\PgLarasetting\App\Repository;

use Xolens\PgLarasetting\App\Model\EnumItem;
use SettingManagementContract\Repository\EnumItemRepoContract;

class EnumItemRepository implements EnumItemRepoContract
{
    public static function model(){
        return EnumItem::class;
    }
    
}
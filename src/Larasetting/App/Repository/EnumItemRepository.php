<?php

namespace Xolens\Larasetting\App\Repository;

use Xolens\Larasetting\App\Model\EnumItem;
use SettingManagementContract\Repository\EnumItemRepoContract;

class EnumItemRepository implements EnumItemRepoContract
{
    public static function model(){
        return EnumItem::class;
    }
    
}
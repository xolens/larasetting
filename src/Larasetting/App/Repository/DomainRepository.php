<?php

namespace Xolens\Larasetting\App\Repository;

use Xolens\Larasetting\App\Model\Domain;
use SettingManagementContract\Repository\DomainRepoContract;

class DomainRepository implements DomainRepoContract
{
    public static function model(){
        return Domain::class;
    }
    
}
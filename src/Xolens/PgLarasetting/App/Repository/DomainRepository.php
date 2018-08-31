<?php

namespace Xolens\PgLarasetting\App\Repository;

use Xolens\PgLarasetting\App\Model\Domain;
use SettingManagementContract\Repository\DomainRepoContract;

class DomainRepository implements DomainRepoContract
{
    public static function model(){
        return Domain::class;
    }
    
}
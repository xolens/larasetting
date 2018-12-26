<?php

namespace Xolens\PgLarasetting\App\Repository;

use Xolens\PgLarasetting\App\Model\EnumGroup;
use Xolens\LarasettingContract\App\Contract\Repository\EnumGroupRepositoryContract;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;

class EnumGroupRepository extends AbstractWritableRepository implements EnumGroupRepositoryContract
{
    public function model(){
        return EnumGroup::class;
    }
    
}
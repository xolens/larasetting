<?php

namespace Xolens\PgLarasetting\App\Repository;

use Xolens\PgLarasetting\App\Model\Domain;
use Xolens\PgLarasetting\App\Repository\DomainRepositoryContract;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;

class DomainRepository extends AbstractWritableRepository implements DomainRepositoryContract
{
    public function model(){
        return Domain::class;
    }
    
}
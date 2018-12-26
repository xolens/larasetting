<?php

namespace Xolens\PgLarasetting\App\Repository;

use Xolens\PgLarasetting\App\Model\Preference;
use Xolens\LarasettingContract\App\Contract\Repository\PreferenceRepositoryContract;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;
use Xolens\LarautilContract\App\Util\Model\Sorter;
use Xolens\LarautilContract\App\Util\Model\Filterer;

class PreferenceRepository extends AbstractWritableRepository implements PreferenceRepositoryContract
{
    public function model(){
        return Preference::class;
    }
    
    public function paginateByDomain($parentId, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page'){
        $parentFilterer = new Filterer();
        $parentFilterer->equals(Preference::DOMAIN_PROPERTY, $parentId);
        return $this->paginateFiltered($parentFilterer, $perPage, $page,  $columns, $pageName);
    }

    public function paginateByDomainSorted($parentId, Sorter $sorter, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page'){
        $parentFilterer = new Filterer();
        $parentFilterer->equals(Preference::DOMAIN_PROPERTY, $parentId);
        return $this->paginateFiltered($parentFilterer, $perPage, $page,  $columns, $pageName);
    }
    
    public function paginateByDomainFiltered($parentId, Filterer $filterer, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page'){
        $parentFilterer = new Filterer();
        $parentFilterer->equals(Preference::DOMAIN_PROPERTY, $parentId);
        $parentFilterer->and($parentFilterer);
        return $this->paginateSortedFiltered($sorter, $parentFilterer, $perPage, $page,  $columns, $pageName);
    }
    
    public function paginateByDomainSortedFiltered($parentId, Sorter $sorter, Filterer $filterer, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page'){
        $parentFilterer = new Filterer();
        $parentFilterer->equals(Preference::DOMAIN_PROPERTY, $parentId);
        $parentFilterer->and($parentFilterer);
        return $this->paginateSortedFiltered($sorter, $parentFilterer, $perPage, $page,  $columns, $pageName);
    }
}
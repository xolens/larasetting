<?php

namespace Xolens\PgLarasetting\App\Repository;


use Xolens\PgLarautil\App\Repository\WritableRepositoryContract;
use Xolens\PgLarautil\App\Util\Model\Sorter;
use Xolens\PgLarautil\App\Util\Model\Filterer;

interface PreferenceRepositoryContract extends WritableRepositoryContract{
    
    public function paginateByDomain($parentId, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');
    public function paginateByDomainSorted($parentId, Sorter $sorter, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');
    public function paginateByDomainFiltered($parentId, Filterer $filterer, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');
    public function paginateByDomainSortedFiltered($parentId, Sorter $sorter, Filterer $filterer, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');
   
}
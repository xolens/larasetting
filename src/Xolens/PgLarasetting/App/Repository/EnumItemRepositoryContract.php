<?php

namespace Xolens\PgLarasetting\App\Repository;


use Xolens\PgLarautil\App\Repository\WritableRepositoryContract;
use Xolens\PgLarautil\App\Util\Model\Sorter;
use Xolens\PgLarautil\App\Util\Model\Filterer;

interface EnumItemRepositoryContract extends WritableRepositoryContract{
    
    public function paginateByEnumGroup($parentId, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');
    public function paginateByEnumGroupSorted($parentId, Sorter $sorter, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');
    public function paginateByEnumGroupFiltered($parentId, Filterer $filterer, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');
    public function paginateByEnumGroupSortedFiltered($parentId, Sorter $sorter, Filterer $filterer, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');
    
    public function allByEnumGroup($parentId, $columns = ['*']);
    public function allByEnumGroupSorted($parentId, Sorter $sorter, $columns = ['*']);
    public function allByEnumGroupFiltered($parentId, Filterer $filterer, $columns = ['*']);
    public function allByEnumGroupSortedFiltered($parentId, Sorter $sorter, Filterer $filterer, $columns = ['*']);
    
}
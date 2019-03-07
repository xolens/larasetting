<?php

namespace Xolens\PgLarasetting\App\Repository;


use Xolens\PgLarautil\App\Repository\WritableRepositoryContract;
use Xolens\PgLarautil\App\Util\Model\Sorter;
use Xolens\PgLarautil\App\Util\Model\Filterer;

interface IdentifiablePreferenceRepositoryContract extends WritableRepositoryContract{
    
    public function paginateByPreference($parentId, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');
    public function paginateByPreferenceSorted($parentId, Sorter $sorter, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');
    public function paginateByPreferenceFiltered($parentId, Filterer $filterer, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');
    public function paginateByPreferenceSortedFiltered($parentId, Sorter $sorter, Filterer $filterer, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');
   
    public function paginateByIdentifiable($parentId, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');
    public function paginateByIdentifiableSorted($parentId, Sorter $sorter, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');
    public function paginateByIdentifiableFiltered($parentId, Filterer $filterer, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');
    public function paginateByIdentifiableSortedFiltered($parentId, Sorter $sorter, Filterer $filterer, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');
   
}
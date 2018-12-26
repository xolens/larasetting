<?php

namespace Xolens\PgLarasetting\App\Repository;

use Xolens\PgLarasetting\App\Model\EnumItem;
use Xolens\LarasettingContract\App\Contract\Repository\EnumItemRepositoryContract;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;
use Xolens\LarautilContract\App\Util\Model\Sorter;
use Xolens\LarautilContract\App\Util\Model\Filterer;

class EnumItemRepository extends AbstractWritableRepository implements EnumItemRepositoryContract
{
    public function model(){
        return EnumItem::class;
    }

    public function allByEnumGroup($parentId, $columns = ['*']){
        $parentFilterer = new Filterer();
        $parentFilterer->equals(EnumItem::ENUM_GROUP_PROPERTY, $parentId);
        return $this->allFiltered($parentFilterer, $perPage, $page,  $columns, $pageName);
    }

    public function allByEnumGroupSorted($parentId, Sorter $sorter, $columns = ['*']){
        $parentFilterer = new Filterer();
        $parentFilterer->equals(EnumItem::ENUM_GROUP_PROPERTY, $parentId);
        return $this->allSortedFiltered($sorter, $parentFilterer, $perPage, $page,  $columns, $pageName);
    }
    
    public function allByEnumGroupFiltered($parentId, Filterer $filterer, $columns = ['*']){
        $parentFilterer = new Filterer();
        $parentFilterer->equals(EnumItem::ENUM_GROUP_PROPERTY, $parentId);
        $parentFilterer->and($filterer);
        return $this->allFiltered($parentFilterer, $perPage, $page,  $columns, $pageName);
    }
    
    public function allByEnumGroupSortedFiltered($parentId, Sorter $sorter, Filterer $filterer, $columns = ['*']){
        $parentFilterer = new Filterer();
        $parentFilterer->equals(EnumItem::ENUM_GROUP_PROPERTY, $parentId);
        $parentFilterer->and($filterer);
        return $this->allSortedFiltered($sorter, $parentFilterer, $perPage, $page,  $columns, $pageName);
    }

    public function paginateByEnumGroup($parentId, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page'){
        $parentFilterer = new Filterer();
        $parentFilterer->equals(EnumItem::ENUM_GROUP_PROPERTY, $parentId);
        return $this->paginateFiltered($parentFilterer, $perPage, $page,  $columns, $pageName);
    }

    public function paginateByEnumGroupSorted($parentId, Sorter $sorter, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page'){
        $parentFilterer = new Filterer();
        $parentFilterer->equals(EnumItem::ENUM_GROUP_PROPERTY, $parentId);
        return $this->paginateSortedFiltered($sorter, $parentFilterer, $perPage, $page,  $columns, $pageName);
    }
    
    public function paginateByEnumGroupFiltered($parentId, Filterer $filterer, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page'){
        $parentFilterer = new Filterer();
        $parentFilterer->equals(EnumItem::ENUM_GROUP_PROPERTY, $parentId);
        $parentFilterer->and($filterer);
        return $this->paginateFiltered($parentFilterer, $perPage, $page,  $columns, $pageName);
    }
    
    public function paginateByEnumGroupSortedFiltered($parentId, Sorter $sorter, Filterer $filterer, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page'){
        $parentFilterer = new Filterer();
        $parentFilterer->equals(EnumItem::ENUM_GROUP_PROPERTY, $parentId);
        $parentFilterer->and($filterer);
        return $this->paginateSortedFiltered($sorter, $parentFilterer, $perPage, $page,  $columns, $pageName);
    }
    
}
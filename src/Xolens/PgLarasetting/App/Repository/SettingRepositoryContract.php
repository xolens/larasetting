<?php

namespace Xolens\PgLarasetting\App\Repository;


use Xolens\PgLarautil\App\Repository\WritableRepositoryContract;

interface SettingRepositoryContract extends WritableRepositoryContract{
    
    public function getValue($key);
    public function setValue($key, $value);

}
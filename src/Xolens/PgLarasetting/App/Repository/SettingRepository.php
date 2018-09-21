<?php

namespace Xolens\PgLarasetting\App\Repository;

use Xolens\PgLarasetting\App\Model\Setting;
use Xolens\LarasettingContract\App\Repository\Contract\SettingRepositoryContract;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;

class SettingRepository extends AbstractWritableRepository implements SettingRepositoryContract
{
    public function model(){
        return Setting::class;
    }

    public function getValue($key){
        $response = $this->model()::where(Setting::NAME_PROPERTY, $toFind);
        return $this->returnResponse($response);
    }

    public function setValue($key, $value){
        $model = $this->model();
        $data = [Setting::VALUE_PROPERTY=> $value];
        $response =  $model::where(Setting::NAME_PROPERTY, $key)->update($data);
        return $this->returnResponse($response);
    }
}
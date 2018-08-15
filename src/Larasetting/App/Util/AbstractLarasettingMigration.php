<?php

namespace Xolens\Larasetting\App\Util;

use Xolens\Larautil\App\Util\AbstractLarautilMigration;
use Illuminate\Support\Facades\DB;
use LarautilCreateDatabaseLogTriggerFunction;
use Xolens\Larasetting\App\Model\Domain;

abstract class AbstractLarasettingMigration extends AbstractLarautilMigration 
{
    public static function registerForPreference($model){
        $model = new Domain(['table_name'=>self::table(),'model'=>$model]);
        $model->save();
        return $model;
    }

    public static function unregisterFromPreference(){
        Domain::where('table_name',self::table())->delete();
        return;
    }
}

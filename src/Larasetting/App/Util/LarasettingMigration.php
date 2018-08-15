<?php

namespace Xolens\Larasetting\App\Util;

use Illuminate\Support\Facades\DB;
use LarautilCreateDatabaseLogTriggerFunction;

abstract class LarasettingMigration extends AbstractLarasettingMigration 
{
    public static function tablePrefix(){
        return config('larasetting.database_table_prefix');
    }

    public static function triggerPrefix(){
        return config('larasetting.database_trigger_prefix');
    }

    public static function logEnabled(){
        return config('larasetting.enable_database_log');
    }
}

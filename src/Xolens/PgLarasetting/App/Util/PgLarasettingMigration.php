<?php

namespace Xolens\PgLarasetting\App\Util;

use Illuminate\Support\Facades\DB;
use PgLarautilCreateDatabaseLogTriggerFunction;

abstract class PgLarasettingMigration extends AbstractPgLarasettingMigration 
{
    public static function tablePrefix(){
        return config('xolens-config.pglarasetting-database_table_prefix');
    }

    public static function triggerPrefix(){
        return config('xolens-config.pglarasetting-database_trigger_prefix');
    }

    public static function logEnabled(){
        return config('xolens-config.pglarasetting-enable_database_log');
    }
}

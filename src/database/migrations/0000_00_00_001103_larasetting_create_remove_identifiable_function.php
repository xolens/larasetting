<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Xolens\Larasetting\App\Util\LarasettingMigration;

class LarasettingCreateRemoveIdentifiableFunction extends LarasettingMigration
{
    /**
     * Return table name
     *
     * @return string
     */
    public static function tableName(){
        return 'remove_identifiable_function';
    }
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE OR REPLACE FUNCTION ".self::table()."(__domain_table_name text) RETURNS TEXT
            LANGUAGE plpgsql AS $$
                BEGIN
                    EXECUTE format('DROP TRIGGER ".LarasettingCreateIdentifiableTriggerFunction::table()."_on_%s
                    ON %s;', $1, $1);
                    RETURN NULL;
                END;
            $$;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("
            DROP FUNCTION IF EXISTS ".self::table()."() CASCADE;
        ");
    }
}

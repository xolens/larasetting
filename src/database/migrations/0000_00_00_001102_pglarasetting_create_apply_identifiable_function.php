<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Xolens\PgLarasetting\App\Util\PgLarasettingMigration;

class PgLarasettingCreateApplyIdentifiableFunction extends PgLarasettingMigration
{
    /**
     * Return table name
     *
     * @return string
     */
    public static function tableName(){
        return 'apply_identifiable_function';
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
                    EXECUTE format('CREATE TRIGGER ".PgLarasettingCreateIdentifiableTriggerFunction::table()."_on_%s AFTER INSERT OR UPDATE OR DELETE ON %s
                    FOR EACH ROW EXECUTE PROCEDURE ".PgLarasettingCreateIdentifiableTriggerFunction::table()."();', $1, $1);
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

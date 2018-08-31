<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Xolens\PgLarasetting\App\Util\PgLarasettingMigration;

class PgLarasettingCreateDomainTrigger extends PgLarasettingMigration
{
    /**
     * Return table name
     *
     * @return string
     */
    public static function tableName(){
        return 'domain_trigger';
    }
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE OR REPLACE FUNCTION ".self::table()."() RETURNS trigger
            LANGUAGE plpgsql AS $$
                DECLARE
                    __create_trigger bool;
                    __drop_trigger bool;
                BEGIN
                    IF TG_OP = 'INSERT' THEN
                        __create_trigger = true;
                        __drop_trigger = false;
                    ELSEIF TG_OP = 'UPDATE' THEN
                        __create_trigger = true;
                        __drop_trigger = true;
                    ELSEIF TG_OP = 'DELETE' THEN
                        __create_trigger = false;
                        __drop_trigger = true;
                    END IF;

                    IF __drop_trigger THEN
                        PERFORM ".PgLarasettingCreateRemoveIdentifiableFunction::table()."(OLD.table_name);
                    END IF;

                    IF __create_trigger THEN
                        PERFORM ".PgLarasettingCreateApplyIdentifiableFunction::table()."(NEW.table_name);
                    END IF;

                    RETURN NULL;
                END;
            $$;

        ");
        DB::statement("
            CREATE TRIGGER  ".self::trigger()." AFTER INSERT OR DELETE OR UPDATE ON ".PgLarasettingCreateTableDomains::table()." FOR EACH ROW
            EXECUTE PROCEDURE  ".self::table()."();
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
            DROP TRIGGER ".self::trigger()." ON ".PgLarasettingCreateTableDomains::table().";
        ");
        DB::statement("
            DROP FUNCTION IF EXISTS ".self::table()."() CASCADE;
        ");
    }
}

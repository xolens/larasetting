<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Xolens\PgLarasetting\App\Util\PgLarasettingMigration;

class PgLarasettingCreatePreferenceTrigger extends PgLarasettingMigration
{
    /**
     * Return table name
     *
     * @return string
     */
    public static function tableName(){
        return 'preference_trigger';
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
                    __identifiable_domain_id integer;
                    __identifiable_domain_model text;
                    __identifiable_domain_table text;
                    __do_delete bool;
                    __do_create bool;
                BEGIN
                    IF TG_OP = 'INSERT' THEN
                        __do_delete = false;
                        __do_create = true;
                    ELSEIF TG_OP = 'UPDATE' THEN
                        IF OLD.id = NEW.id THEN
                            __do_delete = false;
                            __do_create = false;
                        ELSE
                            __do_delete = true;
                            __do_create = true;
                        END IF;
                    ELSEIF TG_OP = 'DELETE' THEN
                        __do_delete = true;
                        __do_create = false;
                    END IF;

                    IF __do_delete THEN
                        SELECT
                            id,
                            model
                        INTO 
                            __identifiable_domain_id,
                            __identifiable_domain_model
                        FROM ".PgLarasettingCreateTableDomains::table()."
                        WHERE id = OLD.id_domain;

                        DELETE FROM ".PgLarasettingCreateTableIdentifiablePreferences::table()."
                        WHERE id_preference = OLD.id;

                    END IF;

                    IF __do_create THEN
                        SELECT
                            id,
                            table_name,
                            model
                        INTO 
                            __identifiable_domain_id,
                            __identifiable_domain_table,
                            __identifiable_domain_model
                        FROM ".PgLarasettingCreateTableDomains::table()."
                        WHERE id = NEW.id_domain;

                        EXECUTE format('
                            INSERT INTO ".PgLarasettingCreateTableIdentifiablePreferences::table()."(identifiable_id, id_preference, preference_value, identifiable_model)(
                                SELECT 
                                    %s.id, 
                                    $1,
                                    $2,
                                    $3
                                FROM %s
                            );',
                        __identifiable_domain_table, __identifiable_domain_table)
                        USING NEW.id, NEW.default, __identifiable_domain_model;
                   
                    END IF;

                    RETURN NULL;
                END;
            $$;

        ");
        DB::statement("
            CREATE TRIGGER  ".self::trigger()." AFTER INSERT OR DELETE OR UPDATE ON ".PgLarasettingCreateTablePreferences::table()." FOR EACH ROW
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
            DROP TRIGGER ".self::trigger()." ON ".PgLarasettingCreateTablePreferences::table().";
        ");
        DB::statement("
            DROP FUNCTION IF EXISTS ".self::table()."() CASCADE;
        ");
    }
}

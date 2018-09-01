<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Xolens\PgLarasetting\App\Util\PgLarasettingMigration;

class PgLarasettingCreateIdentifiableTriggerFunction extends PgLarasettingMigration
{
    /**
     * Return table name
     *
     * @return string
     */
    public static function tableName(){
        return 'identifiable_trigger_function';
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
                    __do_delete bool;
                    __do_create bool;
                BEGIN
                    SELECT
                        id,
                        model
                    INTO 
                        __identifiable_domain_id,
                        __identifiable_domain_model
                    FROM ".PgLarasettingCreateTableDomains::table()."
                    WHERE table_name = TG_TABLE_NAME;

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
                        DELETE FROM ".PgLarasettingCreateTableIdentifiablePreferences::table()."
                        WHERE identifiable_id = OLD.id AND preference_id IN (
                            SELECT id FROM ".PgLarasettingCreateTablePreferences::table()."
                            WHERE domain_id = __identifiable_domain_id
                        );
                    END IF;

                    IF __do_create THEN
                        INSERT INTO ".PgLarasettingCreateTableIdentifiablePreferences::table()."(identifiable_id, preference_id, preference_value, identifiable_model)(
                            SELECT 
                                NEW.id, 
                                ".PgLarasettingCreateTablePreferences::table().".id,
                                ".PgLarasettingCreateTablePreferences::table().".default,
                                __identifiable_domain_model 
                            FROM ".PgLarasettingCreateTablePreferences::table()."
                            WHERE domain_id = __identifiable_domain_id 
                        );
                    END IF;

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

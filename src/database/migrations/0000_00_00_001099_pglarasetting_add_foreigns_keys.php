<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

use Xolens\PgLarasetting\App\Util\PgLarasettingMigration;

class PgLarasettingAddForeignsKeys extends PgLarasettingMigration
{
    /**
     * Return table name
     *
     * @return string
     */
    public static function tableName(){
        return null;
    }    

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(PgLarasettingCreateTableEnumItems::table(), function (Blueprint $table) {
            $table->foreign('id_enum_group')->references('id')->on(PgLarasettingCreateTableEnumGroups::table())->onDelete('cascade');      
        });
        Schema::table(PgLarasettingCreateTableIdentifiablePreferences::table(), function (Blueprint $table) {
            $table->foreign('id_preference')->references('id')->on(PgLarasettingCreateTablePreferences::table())->onDelete('cascade');      
        });
        Schema::table(PgLarasettingCreateTablePreferences::table(), function (Blueprint $table) {
            $table->foreign('id_domain')->references('id')->on(PgLarasettingCreateTableDomains::table())->onDelete('cascade');      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(PgLarasettingCreateTablePreferences::table(), function (Blueprint $table) {
            $table->dropForeign(['id_domain']);      
        });
        Schema::table(PgLarasettingCreateTableIdentifiablePreferences::table(), function (Blueprint $table) {
            $table->dropForeign(['id_preference']);      
        });
        Schema::table(PgLarasettingCreateTableEnumItems::table(), function (Blueprint $table) {
            $table->dropForeign(['id_enum_group']);      
        });
    }
}

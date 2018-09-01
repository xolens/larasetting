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
            $table->foreign('enum_group_id')->references('id')->on(PgLarasettingCreateTableEnumGroups::table())->onDelete('cascade');      
        });
        Schema::table(PgLarasettingCreateTableIdentifiablePreferences::table(), function (Blueprint $table) {
            $table->foreign('preference_id')->references('id')->on(PgLarasettingCreateTablePreferences::table())->onDelete('cascade');      
        });
        Schema::table(PgLarasettingCreateTablePreferences::table(), function (Blueprint $table) {
            $table->foreign('domain_id')->references('id')->on(PgLarasettingCreateTableDomains::table())->onDelete('cascade');      
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
            $table->dropForeign(['domain_id']);      
        });
        Schema::table(PgLarasettingCreateTableIdentifiablePreferences::table(), function (Blueprint $table) {
            $table->dropForeign(['preference_id']);      
        });
        Schema::table(PgLarasettingCreateTableEnumItems::table(), function (Blueprint $table) {
            $table->dropForeign(['enum_group_id']);      
        });
    }
}

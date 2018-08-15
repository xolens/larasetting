<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

use Xolens\Larasetting\App\Util\LarasettingMigration;

class LarasettingAddForeignsKeys extends LarasettingMigration
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
        Schema::table(LarasettingCreateTableEnumItems::table(), function (Blueprint $table) {
            $table->foreign('id_enum_group')->references('id')->on(LarasettingCreateTableEnumGroups::table())->onDelete('cascade');      
        });
        Schema::table(LarasettingCreateTableIdentifiablePreferences::table(), function (Blueprint $table) {
            $table->foreign('id_preference')->references('id')->on(LarasettingCreateTablePreferences::table())->onDelete('cascade');      
        });
        Schema::table(LarasettingCreateTablePreferences::table(), function (Blueprint $table) {
            $table->foreign('id_domain')->references('id')->on(LarasettingCreateTableDomains::table())->onDelete('cascade');      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(LarasettingCreateTablePreferences::table(), function (Blueprint $table) {
            $table->dropForeign(['id_domain']);      
        });
        Schema::table(LarasettingCreateTableIdentifiablePreferences::table(), function (Blueprint $table) {
            $table->dropForeign(['id_preference']);      
        });
        Schema::table(LarasettingCreateTableEnumItems::table(), function (Blueprint $table) {
            $table->dropForeign(['id_enum_group']);      
        });
    }
}

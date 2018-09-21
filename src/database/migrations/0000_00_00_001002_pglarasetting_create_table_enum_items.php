<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

use Xolens\PgLarasetting\App\Util\PgLarasettingMigration;

class PgLarasettingCreateTableEnumItems extends PgLarasettingMigration
{
    /**
     * Return table name
     *
     * @return string
     */
    public static function tableName(){
        return 'enum_items';
    }    

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::table(), function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('display');
            $table->string('description')->nullable();
            $table->integer('enum_group_id')->index();
            $table->unique(['name', 'enum_group_id']);
        });
        if(self::logEnabled()){
            self::registerForLog();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(self::logEnabled()){
            self::unregisterFromLog();
        }
        Schema::dropIfExists(self::table());

    }
}

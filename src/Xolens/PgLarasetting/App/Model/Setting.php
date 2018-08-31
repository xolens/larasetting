<?php

namespace Xolens\PgLarasetting\App\Model;

use Illuminate\Database\Eloquent\Model;

use PgLarasettingCreateTableSettings;
use SettingManagementContract\Model\SettingContract;


class Setting extends Model implements SettingContract
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name','value','public'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct() {
        $this->table = PgLarasettingCreateTableSettings::table();
        parent::__construct();
    }

    public function getId(){
        return $this->id;
    }
}
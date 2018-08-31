<?php

namespace Xolens\PgLarasetting\App\Model;

use Illuminate\Database\Eloquent\Model;

use PgLarasettingCreateTableDomains;
use PgLarasettingCreateTablePreferences;
use SettingManagementContract\Model\DomainContract;


class Domain extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','table_name','model'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct() {
        $this->table = PgLarasettingCreateTableDomains::table();
        parent::__construct();
    }
    
    public function preferences()
    {
        return $this->hasMany('Xolens\PgLarasetting\App\Model\Preference','id_domain');
    }

    public function getId(){
        return $this->id;
    }

    public function getTableName(){
        return $this->table_name;
    }

    public function getModel(){
        return $this->model;
    }
    
    public function setTableName($tableName){
        $this->table_name = $tableName;
    }

    public function setModel($model){
        $this->model = $model;
    }
}
<?php

namespace Xolens\Larasetting\App\Model;

use Illuminate\Database\Eloquent\Model;

use LarasettingCreateTableDomains;
use LarasettingCreateTablePreferences;
use SettingManagementContract\Model\DomainContract;


class Domain extends Model implements DomainContract
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
        $this->table = LarasettingCreateTableDomains::table();
        parent::__construct();
    }
    
    public function preferences()
    {
        return $this->hasMany('Xolens\Larasetting\App\Model\Preference','id_domain');
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
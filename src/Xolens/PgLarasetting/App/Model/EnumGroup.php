<?php

namespace Xolens\PgLarasetting\App\Model;

use Illuminate\Database\Eloquent\Model;

use PgLarasettingCreateTableEnumGroups;
use SettingManagementContract\Model\EnumGroupContract;


class EnumGroup extends Model implements EnumGroupContract
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name','description','default'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct() {
        $this->table = PgLarasettingCreateTableEnumGroups::table();
        parent::__construct();
    }
    
    public function enumItems()
    {
        return $this->hasMany('Xolens\PgLarasetting\App\Model\EnumItem','id_enum_group');
    }

    public function getId(){
        return $this->id;
    }

}
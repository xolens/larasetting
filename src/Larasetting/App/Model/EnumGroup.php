<?php

namespace Xolens\Larasetting\App\Model;

use Illuminate\Database\Eloquent\Model;

use LarasettingCreateTableEnumGroups;
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
        $this->table = LarasettingCreateTableEnumGroups::table();
        parent::__construct();
    }
    
    public function enumItems()
    {
        return $this->hasMany('Xolens\Larasetting\App\Model\EnumItem','id_enum_group');
    }

    public function getId(){
        return $this->id;
    }

}
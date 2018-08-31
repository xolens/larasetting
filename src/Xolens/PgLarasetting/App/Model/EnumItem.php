<?php

namespace Xolens\PgLarasetting\App\Model;

use Illuminate\Database\Eloquent\Model;

use PgLarasettingCreateTableEnumItems;
use SettingManagementContract\Model\EnumItemContract;


class EnumItem extends Model implements EnumItemContract
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','label','value','id_enum_group'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct() {
        $this->table = PgLarasettingCreateTableEnumItems::table();
        parent::__construct();
    }
    
    public function enumGroup()
    {
        return $this->belongsTo('Xolens\PgLarasetting\App\Model\EnumGroup','id_enum_group');
    } 

    public function getId(){
        return $this->id;
    }

}
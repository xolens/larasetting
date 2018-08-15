<?php

namespace Xolens\Larasetting\App\Model;

use Illuminate\Database\Eloquent\Model;

use LarasettingCreateTableEnumItems;
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
        $this->table = LarasettingCreateTableEnumItems::table();
        parent::__construct();
    }
    
    public function enumGroup()
    {
        return $this->belongsTo('Xolens\Larasetting\App\Model\EnumGroup','id_enum_group');
    } 

    public function getId(){
        return $this->id;
    }

}
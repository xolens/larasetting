<?php

namespace Xolens\PgLarasetting\App\Model;

use Illuminate\Database\Eloquent\Model;

use PgLarasettingCreateTableEnumItems;

class EnumItem extends Model
{
    public const ENUM_GROUP_PROPERTY = 'enum_group_id';
   
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name','display','description','enum_group_id'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct(array $attributes = []) {
        $this->table = PgLarasettingCreateTableEnumItems::table();
        parent::__construct($attributes);
    }
    
    public function enumGroup()
    {
        return $this->belongsTo('Xolens\PgLarasetting\App\Model\EnumGroup','enum_group_id');
    } 

    public function getId(){
        return $this->id;
    }

}
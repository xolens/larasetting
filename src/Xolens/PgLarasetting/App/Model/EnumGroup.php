<?php

namespace Xolens\PgLarasetting\App\Model;

use Illuminate\Database\Eloquent\Model;

use PgLarasettingCreateTableEnumGroups;


class EnumGroup extends Model
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
    
    function __construct(array $attributes = []) {
        $this->table = PgLarasettingCreateTableEnumGroups::table();
        parent::__construct($attributes);
    }
    
    public function enumItems()
    {
        return $this->hasMany('Xolens\PgLarasetting\App\Model\EnumItem','enum_group_id');
    }

    public function getId(){
        return $this->id;
    }

}
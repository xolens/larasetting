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
    
    function __construct(array $attributes = []) {
        $this->table = PgLarasettingCreateTableDomains::table();
        parent::__construct($attributes);
    }
    
    public function preferences()
    {
        return $this->hasMany('Xolens\PgLarasetting\App\Model\Preference','domain_id');
    }

    public function getId(){
        return $this->id;
    }

}
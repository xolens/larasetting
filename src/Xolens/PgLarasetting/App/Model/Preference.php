<?php

namespace Xolens\PgLarasetting\App\Model;

use Illuminate\Database\Eloquent\Model;

use PgLarasettingCreateTablePreferences;
use SettingManagementContract\Model\PreferenceContract;


class Preference extends Model implements PreferenceContract
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name','description','default','id_domain'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct() {
        $this->table = PgLarasettingCreateTablePreferences::table();
        parent::__construct();
    }
    
    public function domain()
    {
        return $this->belongsTo('Xolens\PgLarasetting\App\Model\Domain','id_domain');
    } 
    
    public function identifiablePreference()
    {
        return $this->hasMany('Xolens\PgLarasetting\App\Model\IdentifiablePreference','id_preference');
    }

    public function getId(){
        return $this->id;
    }

}
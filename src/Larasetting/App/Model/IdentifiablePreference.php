<?php

namespace Xolens\Larasetting\App\Model;

use Illuminate\Database\Eloquent\Model;

use LarasettingCreateTableIdentifiablePreferences;
use SettingManagementContract\Model\IdentifiablePreferenceContract;


class IdentifiablePreference extends Model implements IdentifiablePreferenceContract
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','preference_value','identifiable_type','identifiable_id','id_preference'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct() {
        $this->table = LarasettingCreateTableIdentifiablePreferences::table();
        parent::__construct();
    }
    
    public function preference()
    {
        return $this->belongsTo('Xolens\Larasetting\App\Model\Preference','id_preference');
    } 

    public function getId(){
        return $this->id;
    }

}
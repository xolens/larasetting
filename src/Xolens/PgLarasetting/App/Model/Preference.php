<?php

namespace Xolens\PgLarasetting\App\Model;

use Illuminate\Database\Eloquent\Model;

use PgLarasettingCreateTablePreferences;

class Preference extends Model
{
    public const DOMAIN_PROPERTY = 'domain_id';
    
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name','description','default','domain_id'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct(array $attributes = []) {
        $this->table = PgLarasettingCreateTablePreferences::table();
        parent::__construct($attributes);
    }
    
    public function domain()
    {
        return $this->belongsTo('Xolens\PgLarasetting\App\Model\Domain','domain_id');
    } 
    
    public function identifiablePreference()
    {
        return $this->hasMany('Xolens\PgLarasetting\App\Model\IdentifiablePreference','preference_id');
    }

    public function getId(){
        return $this->id;
    }

}
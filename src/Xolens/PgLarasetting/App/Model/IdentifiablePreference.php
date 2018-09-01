<?php

namespace Xolens\PgLarasetting\App\Model;

use Illuminate\Database\Eloquent\Model;

use PgLarasettingCreateTableIdentifiablePreferences;

class IdentifiablePreference extends Model
{
    public const PREFERENCE_PROPERTY = 'preference_id';
    public const IDENTIFIABLE_PROPERTY = 'identifiable_id';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','preference_value','identifiable_model','identifiable_id','preference_id'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct(array $attributes = []) {
        $this->table = PgLarasettingCreateTableIdentifiablePreferences::table();
        parent::__construct($attributes);
    }
    
    public function preference()
    {
        return $this->belongsTo('Xolens\PgLarasetting\App\Model\Preference','preference_id');
    } 

    public function getId(){
        return $this->id;
    }

}
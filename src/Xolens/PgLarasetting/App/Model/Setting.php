<?php

namespace Xolens\PgLarasetting\App\Model;

use Illuminate\Database\Eloquent\Model;

use PgLarasettingCreateTableSettings;

class Setting extends Model
{
    public const NAME_PROPERTY = 'name';
    public const VALUE_PROPERTY = 'value';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name','value','public'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct(array $attributes = []) {
        $this->table = PgLarasettingCreateTableSettings::table();
        parent::__construct($attributes);
    }

    public function getId(){
        return $this->id;
    }
}
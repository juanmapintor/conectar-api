<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $nivelID
 * @property string $nivel
 * @property Establecimiento[] $establecimientos
 */
class Nivel extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'nivel';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'nivelID';

    /**
     * @var array
     */
    protected $fillable = ['nivel'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function establecimientos()
    {
        return $this->hasMany('App\Models\Establecimiento', 'nivelID', 'nivelID');
    }
}

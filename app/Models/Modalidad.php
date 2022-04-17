<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $modalidadID
 * @property string $modalidad
 * @property Establecimiento[] $establecimientos
 */
class Modalidad extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'modalidad';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'modalidadID';

    /**
     * @var array
     */
    protected $fillable = ['modalidad'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function establecimientos()
    {
        return $this->hasMany('App\Models\Establecimiento', 'modalidadID', 'modalidadID');
    }
}

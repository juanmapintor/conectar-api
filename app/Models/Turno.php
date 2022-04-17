<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $turnoID
 * @property string $turno
 * @property Establecimiento[] $establecimientos
 */
class Turno extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'turno';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'turnoID';

    /**
     * @var array
     */
    protected $fillable = ['turno'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function establecimientos()
    {
        return $this->belongsToMany('App\Models\Establecimiento', null, 'turnoID', 'establecimientoID');
    }
}

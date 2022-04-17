<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $telefonoEstablecimientoID
 * @property string $telefono
 * @property string $tipo
 * @property integer $establecimientoID
 * @property Establecimiento $establecimiento
 */
class Telefonoestablecimiento extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'telefonoestablecimiento';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'telefonoEstablecimientoID';

    /**
     * @var array
     */
    protected $fillable = ['telefono', 'tipo', 'establecimientoID'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function establecimiento()
    {
        return $this->belongsTo('App\Models\Establecimiento', 'establecimientoID', 'establecimientoID');
    }
}

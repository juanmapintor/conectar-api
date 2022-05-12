<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $domicilioID
 * @property string $provincia
 * @property string $departamento
 * @property string $cod_postal
 * @property string $localidad
 * @property string $barrio
 * @property string $calle
 * @property string $numero
 * @property string $cardinalidad
 * @property float $lat
 * @property float $lng
 * @property string $observacion
 * @property Establecimiento $establecimiento
 */
class Domicilio extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'domicilio';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'domicilioID';

    /**
     * @var array
     */
    protected $fillable = ['provincia', 'departamento', 'cod_postal', 'localidad', 'barrio', 'calle', 'numero', 'cardinalidad', 'lat', 'lng', 'observacion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function establecimiento()
    {
        return $this->hasOne('App\Models\Establecimiento', 'domicilioID', 'domicilioID');
    }
}

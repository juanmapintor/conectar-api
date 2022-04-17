<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $personaID
 * @property string $apellido
 * @property string $nombre
 * @property string $sexo
 * @property string $dni
 * @property string $fecha_nacimiento
 * @property string $cuil
 * @property Comodante[] $comodantes
 * @property Responsable $responsable
 */
class Persona extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'persona';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'personaID';

    /**
     * @var array
     */
    protected $fillable = ['apellido', 'nombre', 'sexo', 'dni', 'fecha_nacimiento', 'cuil'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comodantes()
    {
        return $this->hasMany('App\Models\Comodante', 'personaID', 'personaID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function responsable()
    {
        return $this->hasOne('App\Models\Responsable', 'personaID', 'personaID');
    }
}

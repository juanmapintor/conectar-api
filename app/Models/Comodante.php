<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $comodanteID
 * @property string $mail
 * @property integer $establecimientoID
 * @property integer $personaID
 * @property Alumno[] $alumnos
 * @property Establecimiento $establecimiento
 * @property Persona $persona
 * @property Directivo[] $directivos
 * @property Entrega[] $entregas
 * @property Reclamo[] $reclamos
 */
class Comodante extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'comodante';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'comodanteID';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['mail', 'establecimientoID', 'personaID'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function alumnos()
    {
        return $this->hasMany('App\Models\Alumno', 'comodanteID', 'comodanteID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function establecimiento()
    {
        return $this->belongsTo('App\Models\Establecimiento', 'establecimientoID', 'establecimientoID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function persona()
    {
        return $this->belongsTo('App\Models\Persona', 'personaID', 'personaID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function directivos()
    {
        return $this->hasMany('App\Models\Directivo', 'comodanteID', 'comodanteID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entregas()
    {
        return $this->hasMany('App\Models\Entrega', 'comodanteID', 'comodanteID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reclamos()
    {
        return $this->hasMany('App\Models\Reclamo', 'comodanteID', 'comodanteID');
    }
}

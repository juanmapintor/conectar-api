<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $establecimientoID
 * @property string $cue
 * @property string $nombre
 * @property integer $matricula
 * @property string $mail
 * @property string $horario
 * @property integer $sectorID
 * @property integer $modalidadID
 * @property integer $ambitoID
 * @property integer $nivelID
 * @property integer $zonaID
 * @property integer $domicilioID
 * @property Comodante[] $comodantes
 * @property Ambito $ambito
 * @property Domicilio $domicilio
 * @property Nivel $nivel
 * @property Sector $sector
 * @property Modalidad $modalidad
 * @property Zona $zona
 * @property Oferta[] $ofertas
 * @property Turno[] $turnos
 * @property Telefonoestablecimiento[] $telefonoestablecimientos
 */
class Establecimiento extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'establecimiento';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'establecimientoID';

    /**
     * @var array
     */
    protected $fillable = ['cue', 'nombre', 'matricula', 'mail', 'horario', 'sectorID', 'modalidadID', 'ambitoID', 'nivelID', 'zonaID', 'domicilioID'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comodantes()
    {
        return $this->hasMany('App\Models\Comodante', 'establecimientoID', 'establecimientoID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ambito()
    {
        return $this->belongsTo('App\Models\Ambito', 'ambitoID', 'ambitoID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function domicilio()
    {
        return $this->belongsTo('App\Models\Domicilio', 'domicilioID', 'domicilioID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nivel()
    {
        return $this->belongsTo('App\Models\Nivel', 'nivelID', 'nivelID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sector()
    {
        return $this->belongsTo('App\Models\Sector', 'sectorID', 'sectorID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function modalidad()
    {
        return $this->belongsTo('App\Models\Modalidad', 'modalidadID', 'modalidadID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function zona()
    {
        return $this->belongsTo('App\Models\Zona', 'zonaID', 'zonaID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function ofertas()
    {
        return $this->belongsToMany('App\Models\Oferta', 'establecimiento_oferta', 'establecimientoID', 'ofertaID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function turnos()
    {
        return $this->belongsToMany('App\Models\Turno', null, 'establecimientoID', 'turnoID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function telefonoestablecimientos()
    {
        return $this->hasMany('App\Models\Telefonoestablecimiento', 'establecimientoID', 'establecimientoID');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $dispositivoID
 * @property string $nro_serie
 * @property integer $programaID
 * @property integer $tipoDispositivoID
 * @property Tipodispositivo $tipodispositivo
 * @property Programa $programa
 * @property DispositivoEstado[] $dispositivoEstados
 * @property Entrega $entrega
 * @property Reclamo[] $reclamos
 * @property Verificacion[] $verificacions
 */
class Dispositivo extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'dispositivo';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'dispositivoID';

    /**
     * @var array
     */
    protected $fillable = ['nro_serie', 'programaID', 'tipoDispositivoID'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipodispositivo()
    {
        return $this->belongsTo('App\Models\Tipodispositivo', 'tipoDispositivoID', 'tipoDispositivoID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function programa()
    {
        return $this->belongsTo('App\Models\Programa', 'programaID', 'programaID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dispositivoEstados()
    {
        return $this->hasMany('App\Models\DispositivoEstado', 'dispositivoID', 'dispositivoID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function entrega()
    {
        return $this->hasOne('App\Models\Entrega', 'dispositivoID', 'dispositivoID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reclamos()
    {
        return $this->hasMany('App\Models\Reclamo', 'dispositivoID', 'dispositivoID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function verificacions()
    {
        return $this->hasMany('App\Models\Verificacion', 'dispositivoID', 'dispositivoID');
    }
}

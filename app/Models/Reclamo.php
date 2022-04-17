<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $reclamoID
 * @property string $fecha
 * @property string $observaciones
 * @property integer $comodanteID
 * @property integer $dispositivoID
 * @property Dispositivo $dispositivo
 * @property Comodante $comodante
 */
class Reclamo extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'reclamo';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'reclamoID';

    /**
     * @var array
     */
    protected $fillable = ['fecha', 'observaciones', 'comodanteID', 'dispositivoID'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dispositivo()
    {
        return $this->belongsTo('App\Models\Dispositivo', 'dispositivoID', 'dispositivoID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function comodante()
    {
        return $this->belongsTo('App\Models\Comodante', 'comodanteID', 'comodanteID');
    }
}

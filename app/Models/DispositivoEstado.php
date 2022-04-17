<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $dispositivoEstadoID
 * @property string $fecha_hora
 * @property string $observacion
 * @property integer $estadoID
 * @property integer $dispositivoID
 * @property Estado $estado
 * @property Dispositivo $dispositivo
 */
class DispositivoEstado extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'dispositivo_estado';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'dispositivoEstadoID';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['fecha_hora', 'observacion', 'estadoID', 'dispositivoID'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estado()
    {
        return $this->belongsTo('App\Models\Estado', 'estadoID', 'estadoID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dispositivo()
    {
        return $this->belongsTo('App\Models\Dispositivo', 'dispositivoID', 'dispositivoID');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $verificacionID
 * @property string $fecha_hora
 * @property string $observacion
 * @property integer $apto
 * @property integer $dispositivoID
 * @property Dispositivo $dispositivo
 */
class Verificacion extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'verificacion';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'verificacionID';

    /**
     * @var array
     */
    protected $fillable = ['fecha_hora', 'observacion', 'apto', 'dispositivoID'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dispositivo()
    {
        return $this->belongsTo('App\Models\Dispositivo', 'dispositivoID', 'dispositivoID');
    }
}

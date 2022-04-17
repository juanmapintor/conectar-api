<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $programaID
 * @property string $nombre
 * @property string $detalle
 * @property string $resolucion_nro
 * @property string $destino
 * @property Dispositivo[] $dispositivos
 */
class Programa extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'programa';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'programaID';

    /**
     * @var array
     */
    protected $fillable = ['nombre', 'detalle', 'resolucion_nro', 'destino'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dispositivos()
    {
        return $this->hasMany('App\Models\Dispositivo', 'programaID', 'programaID');
    }
}

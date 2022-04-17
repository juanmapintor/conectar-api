<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $tipoDispositivoID
 * @property string $tipo
 * @property string $descripcion
 * @property string $modelo
 * @property Dispositivo[] $dispositivos
 */
class TipoDispositivo extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tipodispositivo';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'tipoDispositivoID';

    /**
     * @var array
     */
    protected $fillable = ['tipo', 'descripcion', 'modelo'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dispositivos()
    {
        return $this->hasMany('App\Models\Dispositivo', 'tipoDispositivoID', 'tipoDispositivoID');
    }
}

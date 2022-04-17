<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $estadoID
 * @property string $descripcion
 * @property string $estado
 * @property DispositivoEstado[] $dispositivoEstados
 */
class Estado extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'estado';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'estadoID';

    /**
     * @var array
     */
    protected $fillable = ['descripcion', 'estado'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dispositivoEstados()
    {
        return $this->hasMany('App\Models\DispositivoEstado', 'estadoID', 'estadoID');
    }
}

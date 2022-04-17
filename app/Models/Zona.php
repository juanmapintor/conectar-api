<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $zonaID
 * @property string $nombre_zona
 * @property string $apellido_supervisor
 * @property string $nombre_supervisor
 * @property string $mail_supervisor
 * @property string $telefono_supervisor
 * @property Establecimiento[] $establecimientos
 */
class Zona extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'zona';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'zonaID';

    /**
     * @var array
     */
    protected $fillable = ['nombre_zona', 'apellido_supervisor', 'nombre_supervisor', 'mail_supervisor', 'telefono_supervisor'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function establecimientos()
    {
        return $this->hasMany('App\Models\Establecimiento', 'zonaID', 'zonaID');
    }
}

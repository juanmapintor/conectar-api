<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $ofertaID
 * @property string $oferta
 * @property Establecimiento[] $establecimientos
 */
class Oferta extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'oferta';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ofertaID';

    /**
     * @var array
     */
    protected $fillable = ['oferta'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function establecimientos()
    {
        return $this->belongsToMany('App\Models\Establecimiento', 'establecimiento_oferta', 'ofertaID', 'establecimientoID');
    }
}

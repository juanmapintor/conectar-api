<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $ambitoID
 * @property string $ambito
 * @property Establecimiento[] $establecimientos
 */
class Ambito extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ambito';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ambitoID';

    /**
     * @var array
     */
    protected $fillable = ['ambito'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function establecimientos()
    {
        return $this->hasMany('App\Models\Establecimiento', 'ambitoID', 'ambitoID');
    }
}

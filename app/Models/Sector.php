<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $sectorID
 * @property string $sector
 * @property Establecimiento[] $establecimientos
 */
class Sector extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'sector';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'sectorID';

    /**
     * @var array
     */
    protected $fillable = ['sector'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function establecimientos()
    {
        return $this->hasMany('App\Models\Establecimiento', 'sectorID', 'sectorID');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $directivoID
 * @property integer $comodanteID
 * @property Comodante $comodante
 */
class Directivo extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'directivo';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'directivoID';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['comodanteID'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function comodante()
    {
        return $this->belongsTo('App\Models\Comodante', 'comodanteID', 'comodanteID');
    }
}

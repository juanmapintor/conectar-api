<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $alumnoID
 * @property string $seccion_curso
 * @property integer $responsableID
 * @property integer $comodanteID
 * @property Responsable $responsable
 * @property Comodante $comodante
 */
class Alumno extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'alumno';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'alumnoID';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['seccion_curso', 'responsableID', 'comodanteID'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function responsable()
    {
        return $this->belongsTo('App\Models\Responsable', 'responsableID', 'responsableID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function comodante()
    {
        return $this->belongsTo('App\Models\Comodante', 'comodanteID', 'comodanteID');
    }
}

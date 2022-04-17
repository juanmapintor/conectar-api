<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $responsableID
 * @property integer $personaID
 * @property Alumno[] $alumnos
 * @property Persona $persona
 */
class Responsable extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'responsable';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'responsableID';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['personaID'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function alumnos()
    {
        return $this->hasMany('App\Models\Alumno', 'responsableID', 'responsableID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function persona()
    {
        return $this->belongsTo('App\Models\Persona', 'personaID', 'personaID');
    }
}

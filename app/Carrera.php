<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_CARRERA
 * @property int $ID_FACULTAD
 * @property string $TEMA
 * @property string $CODIGO
 * @property string $DESCRIPCION
 * @property integer $NIVEL
 * @property string $ESTADO
 * @property string $updated_at
 * @property string $created_at
 * @property Facultad $facultad
 * @property Estudiante[] $estudiantes
 * @property MallaCurricular[] $mallaCurriculars
 */
class Carrera extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'carrera';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_CARRERA';

    /**
     * @var array
     */
    protected $fillable = ['ID_FACULTAD', 'TEMA', 'CODIGO', 'DESCRIPCION', 'NIVEL', 'ESTADO', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function facultad()
    {
        return $this->belongsTo('App\Facultad', 'ID_FACULTAD', 'ID_FACULTAD');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function estudiantes()
    {
        return $this->hasMany('App\Estudiante', 'ID_CARRERA', 'ID_CARRERA');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mallaCurriculars()
    {
        return $this->hasMany('App\MallaCurricular', 'ID_CARRERA', 'ID_CARRERA');
    }
}

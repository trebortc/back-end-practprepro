<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_MALLA_CURRICULAR
 * @property int $ID_CARRERA
 * @property string $PENSUM
 * @property string $DESCRIPCION
 * @property integer $TOTAL_SEMESTRES
 * @property string $ESTADO
 * @property string $updated_at
 * @property string $created_at
 * @property Carrera $carrera
 * @property Materium[] $materias
 */
class MallaCurricular extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'malla_curricular';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'ID_MALLA_CURRICULAR';

    /**
     * @var array
     */
    protected $fillable = ['ID_CARRERA', 'PENSUM', 'DESCRIPCION', 'TOTAL_SEMESTRES', 'ESTADO', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function carrera()
    {
        return $this->belongsTo('App\Carrera', 'ID_CARRERA', 'ID_CARRERA');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materias()
    {
        return $this->hasMany('App\Materia', 'ID_MALLA_CURRICULAR', 'ID_MALLA_CURRICULAR');
    }
}

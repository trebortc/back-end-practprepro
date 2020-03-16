<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_MATERIA
 * @property int $ID_MALLA_CURRICULAR
 * @property string $TEMA
 * @property integer $SEMESTRE
 * @property string $DESCRIPCION
 * @property string $ESTADO
 * @property string $updated_at
 * @property string $created_at
 * @property MallaCurricular $mallaCurricular
 * @property ProgramaEstudio[] $programaEstudios
 */
class Materia extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'materia';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'ID_MATERIA';

    /**
     * @var array
     */
    protected $fillable = ['ID_MALLA_CURRICULAR', 'TEMA', 'SEMESTRE', 'DESCRIPCION', 'ESTADO', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mallaCurricular()
    {
        return $this->belongsTo('App\MallaCurricular', 'ID_MALLA_CURRICULAR', 'ID_MALLA_CURRICULAR');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function programaEstudios()
    {
        return $this->hasMany('App\ProgramaEstudio', 'ID_MATERIA', 'ID_MATERIA');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function  temasEstudio()
    {
        return $this->hasMany('App\Temas', 'ID_MATERIA', 'ID_MATERIA');
    }
}

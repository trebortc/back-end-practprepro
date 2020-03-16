<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_PROGRAMA_ESTUDIO
 * @property int $ID_MATERIA
 * @property string $UNIDAD_ORGANIZACION_CURRICULAR
 * @property string $CAMPO_FORMACION
 * @property int $HORAS_SEMANALES
 * @property string $NOVEDADES
 * @property string $ESTADO
 * @property string $updated_at
 * @property string $created_at
 * @property Materium $materium
 * @property Tema[] $temas
 */
class ProgramaEstudio extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'programa_estudio';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_PROGRAMA_ESTUDIO';

    /**
     * @var array
     */
    protected $fillable = ['ID_MATERIA', 'UNIDAD_ORGANIZACION_CURRICULAR', 'CAMPO_FORMACION', 'HORAS_SEMANALES', 'NOVEDADES', 'ESTADO', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function materium()
    {
        return $this->belongsTo('App\Materium', 'ID_MATERIA', 'ID_MATERIA');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function temas()
    {
        return $this->hasMany('App\Tema', 'ID_PROGRAMA_ESTUDIO', 'ID_PROGRAMA_ESTUDIO');
    }
}

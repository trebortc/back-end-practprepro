<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_SOLICITUD
 * @property int $ID_ESTUDIANTE
 * @property int $ID_PERIODO_ACADEMICO
 * @property string $NOMBRE_PERIODO
 * @property string $FECHA_INICIO_PERIODO
 * @property string $FECHA_FIN_PERIODO
 * @property string $NOMBRE_EMPRESA
 * @property string $NOMBRE_REPRESENTANTE_EMPRESA
 * @property string $CARGO_REPRESENTANTE_EMPRESA
 * @property string $NOVEDADES
 * @property string $ESTADO
 * @property string $updated_at
 * @property string $created_at
 * @property Estudiante $estudiante
 * @property PeriodoAcademico $periodoAcademico
 * @property InformePractica[] $informePracticas
 */
class Solicitud extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'solicitud';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_SOLICITUD';

    /**
     * @var array
     */
    protected $fillable = ['ID_ESTUDIANTE', 'ID_PERIODO_ACADEMICO', 'NOMBRE_PERIODO', 'FECHA_INICIO_PERIODO', 'FECHA_FIN_PERIODO', 'NOMBRE_EMPRESA', 'NOMBRE_REPRESENTANTE_EMPRESA', 'CARGO_REPRESENTANTE_EMPRESA', 'NOVEDADES', 'ESTADO', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estudiante()
    {
        return $this->belongsTo('App\Estudiante', 'ID_ESTUDIANTE', 'ID_ESTUDIANTE');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function periodoAcademico()
    {
        return $this->belongsTo('App\PeriodoAcademico', 'ID_PERIODO_ACADEMICO', 'ID_PERIODO_ACADEMICO');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function informePracticas()
    {
        return $this->hasMany('App\InformePractica', 'ID_SOLICITUD', 'ID_SOLICITUD');
    }
}

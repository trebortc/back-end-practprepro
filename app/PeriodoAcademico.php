<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_PERIODO_ACADEMICO
 * @property string $TEMA
 * @property string $FECHA_INICIO
 * @property string $FECHA_FIN
 * @property string $DESCRIPCION
 * @property string $ESTADO
 * @property string $updated_at
 * @property string $created_at
 * @property Solicitud[] $solicituds
 */
class PeriodoAcademico extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'periodo_academico';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_PERIODO_ACADEMICO';

    /**
     * @var array
     */
    protected $fillable = ['TEMA', 'FECHA_INICIO', 'FECHA_FIN', 'DESCRIPCION', 'ESTADO', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function solicituds()
    {
        return $this->hasMany('App\Solicitud', 'ID_PERIODO_ACADEMICO', 'ID_PERIODO_ACADEMICO');
    }
}

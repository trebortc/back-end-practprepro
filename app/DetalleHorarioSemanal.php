<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_DETALLE_HORARIO_SEMANAL
 * @property int $ID_PERIODO_PRACTICAS
 * @property string $DIA
 * @property string $HORA_INICIO
 * @property string $HORA_FIN
 * @property string $TIEMPO_ALMUERZO
 * @property float $TOTAL_HORAS
 * @property string $NOVEDADES
 * @property string $ESTADO
 * @property string $updated_at
 * @property string $created_at
 * @property PeriodoPractica $periodoPractica
 */
class DetalleHorarioSemanal extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'detalle_horario_semanal';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_DETALLE_HORARIO_SEMANAL';

    /**
     * @var array
     */
    protected $fillable = ['ID_PERIODO_PRACTICAS', 'DIA', 'HORA_INICIO', 'HORA_FIN', 'TIEMPO_ALMUERZO', 'TOTAL_HORAS', 'NOVEDADES', 'ESTADO', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function periodoPractica()
    {
        return $this->belongsTo('App\PeriodoPractica', 'ID_PERIODO_PRACTICAS', 'ID_PERIODO_PRACTICAS');
    }
}

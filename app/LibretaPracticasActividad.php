<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_LIBRETA_PRACTICAS_ACTIVIDAD
 * @property int $ID_PERIODO_PRACTICAS
 * @property string $TEMA
 * @property string $DESCRIPCION
 * @property string $FECHA_INICIO
 * @property string $FECHA_FIN
 * @property string $NOVEDADES
 * @property string $RECOMENDACIONES
 * @property string $ESTADO
 * @property string $updated_at
 * @property string $created_at
 * @property PeriodoPractica $periodoPractica
 * @property LibretaPracticasActividadDetalle[] $libretaPracticasActividadDetalles
 */
class LibretaPracticasActividad extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'libreta_practicas_actividad';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_LIBRETA_PRACTICAS_ACTIVIDAD';

    /**
     * @var array
     */
    protected $fillable = ['ID_PERIODO_PRACTICAS', 'TEMA', 'DESCRIPCION', 'FECHA_INICIO', 'FECHA_FIN', 'NOVEDADES', 'RECOMENDACIONES', 'ESTADO', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function periodoPractica()
    {
        return $this->belongsTo('App\PeriodoPractica', 'ID_PERIODO_PRACTICAS', 'ID_PERIODO_PRACTICAS');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function libretaPracticasActividadDetalles()
    {
        return $this->hasMany('App\LibretaPracticasActividadDetalle', 'ID_LIBRETA_PRACTICAS_ACTIVIDAD', 'ID_LIBRETA_PRACTICAS_ACTIVIDAD');
    }
}

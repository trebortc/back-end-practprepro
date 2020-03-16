<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_PERIODO_PRACTICAS
 * @property int $ID_INFORME_PRACTICAS
 * @property string $FECHA_INICIO
 * @property string $FECHA_FIN
 * @property float $TOTAL_HORAS
 * @property string $NOVEDADES
 * @property string $ESTADO
 * @property string $updated_at
 * @property string $created_at
 * @property InformePractica $informePractica
 * @property DetalleHorarioSemanal[] $detalleHorarioSemanals
 * @property LibretaPracticasActividad[] $libretaPracticasActividads
 */
class PeriodoPracticas extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_PERIODO_PRACTICAS';

    /**
     * @var array
     */
    protected $fillable = ['ID_INFORME_PRACTICAS', 'FECHA_INICIO', 'FECHA_FIN', 'TOTAL_HORAS', 'NOVEDADES', 'ESTADO', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function informePractica()
    {
        return $this->belongsTo('App\InformePractica', 'ID_INFORME_PRACTICAS', 'ID_INFORME_PRACTICAS');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleHorarioSemanals()
    {
        return $this->hasMany('App\DetalleHorarioSemanal', 'ID_PERIODO_PRACTICAS', 'ID_PERIODO_PRACTICAS');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function libretaPracticasActividads()
    {
        return $this->hasMany('App\LibretaPracticasActividad', 'ID_PERIODO_PRACTICAS', 'ID_PERIODO_PRACTICAS');
    }
}

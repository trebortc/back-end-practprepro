<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_LIBRETA_PRACTICAS_ACTIVIDAD_DETALLE
 * @property int $ID_LIBRETA_PRACTICAS_ACTIVIDAD
 * @property string $DESCRIPCION
 * @property string $ESTADO
 * @property string $updated_at
 * @property string $created_at
 * @property LibretaPracticasActividad $libretaPracticasActividad
 */
class LibretaPracticasActividadDetalle extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'libreta_practicas_actividad_detalle';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_LIBRETA_PRACTICAS_ACTIVIDAD_DETALLE';

    /**
     * @var array
     */
    protected $fillable = ['ID_LIBRETA_PRACTICAS_ACTIVIDAD', 'DESCRIPCION', 'ESTADO', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function libretaPracticasActividad()
    {
        return $this->belongsTo('App\LibretaPracticasActividad', 'ID_LIBRETA_PRACTICAS_ACTIVIDAD', 'ID_LIBRETA_PRACTICAS_ACTIVIDAD');
    }
}

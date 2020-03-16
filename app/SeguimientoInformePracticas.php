<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_SEGUIMIENTO_INFORME_PRACTICAS
 * @property int $ID_INFORME_PRACTICAS
 * @property string $NOMBRE_TUTOR
 * @property string $FECHA
 * @property string $DESCRIPCION
 * @property string $NOVEDADES
 * @property string $ESTADO
 * @property string $updated_at
 * @property string $created_at
 * @property InformePractica $informePractica
 */
class SeguimientoInformePracticas extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_SEGUIMIENTO_INFORME_PRACTICAS';

    /**
     * @var array
     */
    protected $fillable = ['ID_INFORME_PRACTICAS', 'NOMBRE_TUTOR', 'FECHA', 'DESCRIPCION', 'NOVEDADES', 'ESTADO', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function informePractica()
    {
        return $this->belongsTo('App\InformePractica', 'ID_INFORME_PRACTICAS', 'ID_INFORME_PRACTICAS');
    }
}

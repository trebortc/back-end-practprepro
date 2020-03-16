<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_TEMA_UTIL_PRACTICAS_AGREGAR
 * @property int $ID_INFORME_PRACTICAS
 * @property string $TEMA
 * @property string $updated_at
 * @property string $created_at
 * @property InformePractica $informePractica
 */
class TemaUtilPracticasAgregar extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tema_util_practicas_agregar';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_TEMA_UTIL_PRACTICAS_AGREGAR';

    /**
     * @var array
     */
    protected $fillable = ['ID_INFORME_PRACTICAS', 'TEMA', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function informePractica()
    {
        return $this->belongsTo('App\InformePractica', 'ID_INFORME_PRACTICAS', 'ID_INFORME_PRACTICAS');
    }
}

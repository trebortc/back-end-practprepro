<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_HABILIDADES_DESTREZAS_ADQUIRIDAS
 * @property int $ID_INFORME_PRACTICAS
 * @property string $DESCRIPCION
 * @property string $updated_at
 * @property string $created_at
 * @property InformePractica $informePractica
 */
class HabilidadesDestrezasAdquiridas extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_HABILIDADES_DESTREZAS_ADQUIRIDAS';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['ID_INFORME_PRACTICAS', 'DESCRIPCION', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function informePractica()
    {
        return $this->belongsTo('App\InformePractica', 'ID_INFORME_PRACTICAS', 'ID_INFORME_PRACTICAS');
    }
}

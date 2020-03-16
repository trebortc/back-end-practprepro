<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_TEMA_UTIL_PRACTICAS
 * @property int $ID_INFORME_PRACTICAS
 * @property int $ID_TEMAS
 * @property string $updated_at
 * @property string $created_at
 * @property Tema $tema
 * @property InformePractica $informePractica
 */
class TemaUtilPracticas extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_TEMA_UTIL_PRACTICAS';

    /**
     * @var array
     */
    protected $fillable = ['ID_INFORME_PRACTICAS', 'ID_TEMAS', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tema()
    {
        return $this->belongsTo('App\Tema', 'ID_TEMAS', 'ID_TEMAS');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function informePractica()
    {
        return $this->belongsTo('App\InformePractica', 'ID_INFORME_PRACTICAS', 'ID_INFORME_PRACTICAS');
    }
}

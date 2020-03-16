<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_PROFESOR
 * @property int $ID_USUARIO
 * @property string $NOMBRES
 * @property string $APELLIDOS
 * @property string $FECHA_NACIMIENTO
 * @property string $CODIGO
 * @property string $IDENTIFICACION
 * @property string $SEXO
 * @property string $TITULO
 * @property string $NOVEDADES
 * @property string $ESTADO
 * @property string $updated_at
 * @property string $created_at
 * @property Usuario $usuario
 * @property InformePractica[] $informePracticas
 */
class Profesor extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'profesor';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'ID_PROFESOR';

    /**
     * @var array
     */
    protected $fillable = ['ID_USUARIO', 'NOMBRES', 'APELLIDOS', 'FECHA_NACIMIENTO', 'CODIGO', 'IDENTIFICACION', 'SEXO', 'TITULO', 'NOVEDADES', 'ESTADO', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo('App\User', 'id', 'ID_USUARIO');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function informePracticas()
    {
        return $this->hasMany('App\InformePractica', 'ID_PROFESOR', 'ID_PROFESOR');
    }
}

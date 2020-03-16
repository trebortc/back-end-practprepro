<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_ADMINISTRATIVO
  * @property int $ID_USUARIO
 * @property string $NOMBRES
 * @property string $APELLIDOS
 * @property string $FECHA_NACIMIENTO
 * @property string $CODIGO
 * @property string $IDENTIFICACION
 * @property string $SEXO
 * @property string $DIRECCION
 * @property string $TELEFONO
 * @property string $EMAIL_INSTITUCIONAL
 * @property string $EMAIL
 * @property string $ESTADO
 * @property string $updated_at
 * @property string $created_at
 * @property Carrera $carrera
 * @property Usuario $usuario
 */
class Administrativo extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'administrativo';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'ID_ADMINISTRATIVO';

    /**
     * @var array
     */
    protected $fillable = ['ID_USUARIO', 'NOMBRES', 'APELLIDOS', 'FECHA_NACIMIENTO', 'CODIGO', 'IDENTIFICACION', 'SEXO', 'DIRECCION', 'TELEFONO', 'EMAIL_INSTITUCIONAL', 'EMAIL', 'ESTADO', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo('App\User', 'id', 'ID_USUARIO');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_ESTUDIANTE
 * @property int $ID_CARRERA
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
 * @property Solicitud[] $solicituds
 */
class Estudiante extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'estudiante';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'ID_ESTUDIANTE';

    /**
     * @var array
     */
    protected $fillable = ['ID_CARRERA', 'ID_USUARIO', 'NOMBRES', 'APELLIDOS', 'FECHA_NACIMIENTO', 'CODIGO', 'IDENTIFICACION', 'SEXO', 'DIRECCION', 'TELEFONO', 'EMAIL_INSTITUCIONAL', 'EMAIL', 'ESTADO', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function carrera()
    {
        return $this->belongsTo('App\Carrera', 'ID_CARRERA', 'ID_CARRERA');
    }

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
    public function solicituds()
    {
        return $this->hasMany('App\Solicitud', 'ID_ESTUDIANTE', 'ID_ESTUDIANTE');
    }

}

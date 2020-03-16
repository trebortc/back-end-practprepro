<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_INFORME_PRACTICAS
 * @property int $ID_SOLICITUD
 * @property int $ID_PROFESOR
 * @property int $ID_EMPRESA
 * @property string $NOMBRE_ESTUDIANTE
 * @property string $CARRERA_ESTUDIANTE
 * @property string $DIRECCION_ESTUDIANTE
 * @property string $TELEFONO_ESTUDIANTE
 * @property string $EMAIL_ESTUDIANTE
 * @property string $TIPO_IDENTIFICACION_ESTUDIANTE
 * @property string $IDENTIFICACION
 * @property string $NOMBRE_PERIODO
 * @property string $NOMBRE_EMPRESA
 * @property string $NOMBRE_REPRESENTANTE_EMPRESA
 * @property string $CARGO_REPRESENTANTE_EMPRESA
 * @property string $EMAIL_EMPRESA
 * @property string $NOVEDADES
 * @property string $ATTRIBUTE_60
 * @property string $updated_at
 * @property string $created_at
 * @property Profesor $profesor
 * @property Empresa $empresa
 * @property Solicitud $solicitud
 * @property HabilidadesDestrezasAdquirida[] $habilidadesDestrezasAdquiridas
 * @property PeriodoPractica[] $periodoPracticas
 * @property SeguimientoInformePractica[] $seguimientoInformePracticas
 * @property TemaUtilPractica[] $temaUtilPracticas
 * @property TemaUtilPracticasAgregar[] $temaUtilPracticasAgregars
 */
class InformePracticas extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_INFORME_PRACTICAS';

    /**
     * @var array
     */
    protected $fillable = ['ID_SOLICITUD', 'ID_PROFESOR', 'ID_EMPRESA', 'NOMBRE_ESTUDIANTE', 'CARRERA_ESTUDIANTE', 'DIRECCION_ESTUDIANTE', 'TELEFONO_ESTUDIANTE', 'EMAIL_ESTUDIANTE', 'TIPO_IDENTIFICACION_ESTUDIANTE', 'IDENTIFICACION', 'NOMBRE_PERIODO', 'NOMBRE_EMPRESA', 'NOMBRE_REPRESENTANTE_EMPRESA', 'CARGO_REPRESENTANTE_EMPRESA', 'EMAIL_EMPRESA', 'NOVEDADES', 'ATTRIBUTE_60', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function profesor()
    {
        return $this->belongsTo('App\Profesor', 'ID_PROFESOR', 'ID_PROFESOR');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function empresa()
    {
        return $this->belongsTo('App\Empresa', 'ID_EMPRESA', 'ID_EMPRESA');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function solicitud()
    {
        return $this->belongsTo('App\Solicitud', 'ID_SOLICITUD', 'ID_SOLICITUD');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function habilidadesDestrezasAdquiridas()
    {
        return $this->hasMany('App\HabilidadesDestrezasAdquirida', 'ID_INFORME_PRACTICAS', 'ID_INFORME_PRACTICAS');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function periodoPracticas()
    {
        return $this->hasMany('App\PeriodoPractica', 'ID_INFORME_PRACTICAS', 'ID_INFORME_PRACTICAS');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function seguimientoInformePracticas()
    {
        return $this->hasMany('App\SeguimientoInformePractica', 'ID_INFORME_PRACTICAS', 'ID_INFORME_PRACTICAS');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function temaUtilPracticas()
    {
        return $this->hasMany('App\TemaUtilPractica', 'ID_INFORME_PRACTICAS', 'ID_INFORME_PRACTICAS');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function temaUtilPracticasAgregars()
    {
        return $this->hasMany('App\TemaUtilPracticasAgregar', 'ID_INFORME_PRACTICAS', 'ID_INFORME_PRACTICAS');
    }
}

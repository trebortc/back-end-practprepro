<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * @property int $ID_USUARIO
 * @property string $USUARIO
 * @property string $CLAVE
 * @property string $TIPO
 * @property string $ESTADO
 * @property string $NOVEDADES
 * @property string $updated_at
 * @property string $created_at
 * @property Estudiante[] $estudiantes
 * @property Profesor[] $profesors
 */
class Usuario extends Authenticatable implements JWTSubject
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'usuario';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'ID_USUARIO';

    /**
     * @var array
     */
    protected $fillable = ['USUARIO', 'CLAVE', 'TIPO', 'ESTADO', 'NOVEDADES', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function estudiantes()
    {
        return $this->hasMany('App\Estudiante', 'ID_USUARIO', 'ID_USUARIO');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function profesors()
    {
        return $this->hasMany('App\Profesor', 'ID_USUARIO', 'ID_USUARIO');
    }

    use Notifiable;

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}

<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UtilidadesModel extends Authenticatable
{
    /**
     * @return \atributos de la clase
     */
    public static function getAtributos($class)
    {
        $claseAttributos = new \ReflectionClass($class);
        $atributos = $claseAttributos->getDefaultProperties()['fillable'];
        return $atributos;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function estudiantes()
    {
        return $this->hasMany('App\Estudiante', 'ID_CARRERA', 'ID_CARRERA');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mallaCurriculars()
    {
        return $this->hasMany('App\MallaCurricular', 'ID_CARRERA', 'ID_CARRERA');
    }
}

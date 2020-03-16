<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_EMPRESA
 * @property string $TEMA
 * @property string $TIPO
 * @property string $DIRECCION
 * @property string $TELEFONO
 * @property string $CELULAR
 * @property string $NOVEDADES
 * @property string $ESTADO
 * @property string $updated_at
 * @property string $created_at
 * @property InformePractica[] $informePracticas
 * @property Representante[] $representantes
 */
class Empresa extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'empresa';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_EMPRESA';

    /**
     * @var array
     */
    protected $fillable = ['TEMA', 'TIPO', 'DIRECCION', 'TELEFONO', 'CELULAR', 'NOVEDADES', 'ESTADO', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function informePracticas()
    {
        return $this->hasMany('App\InformePractica', 'ID_EMPRESA', 'ID_EMPRESA');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function representantes()
    {
        return $this->hasMany('App\Representante', 'ID_EMPRESA', 'ID_EMPRESA');
    }
}

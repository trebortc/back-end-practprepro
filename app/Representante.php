<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_REPRESENTANTE
 * @property int $ID_EMPRESA
 * @property string $NOMBRES
 * @property string $APELLIDOS
 * @property string $CARGO
 * @property string $TITULO
 * @property string $NOVEDADES
 * @property string $ESTADO
 * @property string $updated_at
 * @property string $created_at
 * @property Empresa $empresa
 */
class Representante extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'representante';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'ID_REPRESENTANTE';

    /**
     * @var array
     */
    protected $fillable = ['ID_EMPRESA', 'ID_USUARIO', 'NOMBRES', 'APELLIDOS', 'CARGO', 'TITULO', 'NOVEDADES', 'ESTADO', 'updated_at', 'created_at'];

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
    public function usuario()
    {
        return $this->belongsTo('App\User', 'id', 'ID_USUARIO');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_FACULTAD
 * @property string $TEMA
 * @property string $SIGLA
 * @property string $DESCRIPCION
 * @property string $ESTADO
 * @property string $updated_at
 * @property string $created_at
 * @property Carrera[] $carreras
 */
class Facultad extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'facultad';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_FACULTAD';

    /**
     * @var array
     */
    protected $fillable = ['TEMA', 'SIGLA', 'DESCRIPCION', 'ESTADO', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function carreras()
    {
        return $this->hasMany('App\Carrera', 'ID_FACULTAD', 'ID_FACULTAD');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_TEMAS
 * @property int $TEM_ID_TEMAS
 * @property int $ID_PROGRAMA_ESTUDIO
 * @property string $TEMA
 * @property string $DESCRIPCION
 * @property string $updated_at
 * @property string $created_at
 * @property ProgramaEstudio $programaEstudio
 * @property Tema $tema
 * @property TemaUtilPractica[] $temaUtilPracticas
 */
class Temas extends Model
{
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'ID_TEMAS';

    /**
     * @var array
     */
    protected $fillable = ['TEM_ID_TEMAS', 'ID_MATERIA', 'TEMA', 'DESCRIPCION', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function materia()
    {
        return $this->belongsTo('App\Materia', 'ID_MATERIA', 'ID_MATERIA');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tema()
    {
        return $this->belongsTo('App\Tema', 'TEM_ID_TEMAS', 'ID_TEMAS');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function temaUtilPracticas()
    {
        return $this->hasMany('App\TemaUtilPractica', 'ID_TEMAS', 'ID_TEMAS');
    }
}

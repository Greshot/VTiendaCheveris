<?php

namespace VTienda;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
        /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'movies';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['titulo', 'descripcion',
        'fecha', 'cantidad'];

    /*Relación de muchos a muchos*/
    public function loans()
    {
        return $this->belongsToMany('GeomedicosApp\Loan', 'loan_movie', 'movie_id', 'loan_id')
            ->withPivot('id', 'observacion', 'cantidad')->withTimestamps();
    }

    public function scopeDropdown()
    {
        return $this->lists('titulo', 'id');
    }
}

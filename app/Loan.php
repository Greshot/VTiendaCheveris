<?php

namespace VTienda;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'loans';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha', 'client_id'];

    /*Relación de muchos a muchos*/
    public function movies()
    {
        return $this->belongsToMany('VTienda\Movie', 'loan_movie', 'loan_id', 'movie_id')
            ->withPivot('id', 'cantidad')->withTimestamps();
    }

    //Relación inversa de uno a muchos
    public function client()
    {
        return $this->belongsTo('VTienda\Client', 'client_id');
    }

}

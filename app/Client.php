<?php

namespace VTienda;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'clients';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['identificacion', 'nombre',
        'telefono', 'email', 'direccion'];

    /*Tiene uno o muchos*/
    public function loans()
    {
        return $this->hasMany('VTienda\Loan');
    }

    public function scopeDropdown()
    {
        return $this->lists('nombre', 'id');
    }
}

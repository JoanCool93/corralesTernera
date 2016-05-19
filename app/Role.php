<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

    protected $table = 'roles';

    /**
    * primaryKey
    *
    * @var string
    * @access protected
    */
    protected $primaryKey = 'idRole';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idRole', 'nombre', 'descripcion', 
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function usuarios()
    {
        return $this->hasMany('App\Usuarios', 'idRole', 'idRole');
    }
}
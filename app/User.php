<?php

namespace Siropa;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'clave_fun', 'email', 'password', 'telefono', 'direccion', 'region','municipio', 'puesto',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($Valor){
        if(!empty($Valor)){
            $this -> attributes['password'] =\Hash::make($Valor);
        }
    }
    public function hasRoles(array $roles){
      foreach ($roles as $role){
        if ($this->puesto === $role){
          return true;
        }
      }
      return false;
    }
    public function scopeSearch($query, $nombre){
      return $query->where('nombre', 'LIKE', "%$nombre%");

    }
}

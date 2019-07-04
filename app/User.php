<?php

namespace App;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','name', 'email', 'password','tipo_dni','dni','direccion','telefono','foto','condicion'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function scopePermitido($query)
    {
        if (auth()->user()->can('view', $this))
        {
            return $query;
        }
        else
        {
            return $query->where('id', auth()->id());
        }
    }

    public function scopeActivo($query) {
        return $query->where("condicion",1);
    }

    public function getRoleDisplayNames()
    {
        return $this->roles->pluck('display_name')->implode(', ');
    }

    public function prioridades(){
    	return $this->belongsTo(PrioridadUsuario::class, 'prioridad_usuario_id');
    }

    public function puestos(){
    	return $this->belongsTo(Puesto::class, 'puesto_id');
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Usuario extends Model implements AuthenticatableContract
{
    use HasFactory, AuthenticatableTrait;
    
    protected $table = 'usuarios';
    protected $fillable = [
        'email',
        'password',
       
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function hasRole($role)
{
    return $this->role === $role;
}


public function productos()
{
    return $this->hasMany(Producto::class);
}

public function transacciones()
{
    return $this->hasMany(Transaccion::class);
}

public function fechaAlta()
{
    return Carbon::parse($this->created_at)->format('d/m/Y');
}

public function totalTransacciones()
{
    return $this->transacciones()->count();
}

public function totalProductos()
{
    return $this->productos()->count();
}
}

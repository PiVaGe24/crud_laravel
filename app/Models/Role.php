<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = [
        'role_name',
    ];

    public function employees() {
        return $this->hasMany(Employee::class,'id');//Un Rol Tiene muchos Empleados
    }
}

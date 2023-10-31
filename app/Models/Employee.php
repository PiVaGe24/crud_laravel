<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable = [
        'full_name',
        'username',
        'address',
        'telephone',
        'email',
        'password',
        'role_id',
    ];

    public function roles(){
        //return $this->hasMany('App\Models\Role');
        return $this->belongsTo(Role::class, 'role_id');//Un Empleado pertenecen a un rol
    }
}

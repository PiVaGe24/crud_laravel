<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSheet extends Model
{
    use HasFactory;

    protected $table = 'data_sheets';
    
    protected $fillable = [
        'name_machine',
        'code',
        'brand',
        'model',
        'maker',
        'serial_number',
        'creation_date',
        'start_date',//puesta en marcha
        'warranty_date',
        'useful_date',
        'provider',
        'address',
        'telephone'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = ["nombre", "dirreccion", "telefono", "tipo_sangre", "experiencia", "fecha_nacimiento"];
}
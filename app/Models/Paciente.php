<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = ["nombre", "eps", "dirreccion", "tel", "nombre_acompañante", "tel_acompañante"];
}

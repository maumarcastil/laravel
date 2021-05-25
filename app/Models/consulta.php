<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consulta extends Model
{
    protected $fillable = ["antecedentes", "motivos", "diagnostico", "paciente_id", "doctor_id"];
}

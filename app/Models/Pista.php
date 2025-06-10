<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\VarDumper\Exception\ThrowingCasterException;

class Pista extends Model
{
    /** @use HasFactory<\Database\Factories\PistaFactory> */
    use HasFactory;

    protected $fillable = ['nombre'];

    public function reservas(){
        return $this->hasMany(Reserva::class);
    }
}

<?php

namespace App\Livewire;

use App\Models\Pista as ModelsPista;
use App\Models\Reserva;
use Livewire\Component;
use Livewire\Volt\Compilers\Mount;

class Pista extends Component
{

    public $pista_id;
    public $pistas;
    public $pistaSeleccion;
    public $reservas;

    public function mount(){
        $this->pistas = ModelsPista::all();
        $this->pista_id = 1;
        $this->pistaSeleccion = Reserva::where('pista_id', $this->pista_id)->first();
    }

    public function reservar($fecha_hora){
        Reserva::create([
            'pista_id' => $this->pista_id,
            'dia_y_hora' => $fecha_hora,
            'user_id' => auth()->user()->id,
        ]);
    }

    public function anular($reserva_id){
        Reserva::destroy($reserva_id);
    }

    public function render()
    {
        return view('livewire.pista');
    }
}

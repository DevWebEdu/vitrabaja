<?php

namespace App\Livewire;

use App\Models\Vacante;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class MostrarVacantes extends Component


{
    protected $listeners = ['eliminarVacante'];

    public function eliminarVacante( $id){
        DB::table('vacantes')->where('id', $id)->delete();
    }
    
    public function render()
    {
        $vacantes = Vacante::where('user_id', auth()->user()->id)->paginate(5);
        return view('livewire.mostrar-vacantes',[
            'vacantes' => $vacantes
        ]);
    }
}

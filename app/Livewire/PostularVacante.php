<?php

namespace App\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    use WithFileUploads;
    public $cv;
    public $vacante;

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
    }

    public function postularme()
    {
        $this->validate();

        // Almacenar CV en el disco duro
        $cv = $this->cv->store('public/cv');
        $datos['cv'] = str_replace('public/cv/', '', $cv);

        // Crear la vacante
        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $datos['cv']
        ]);

        // Crear notificiacion y enviar email
        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, auth()->user()->id));

        // Mostrar el usuario un mensaje de Ok
        session()->flash('mensaje', 'Se envio correctamente tu información');
        return redirect()->back();
    }

    public function render()
    {
        $existe = DB::table('candidatos')
            ->where('user_id', auth()->user()->id)
            ->where('vacante_id', $this->vacante->id)
            ->exists();


        if ($existe) {
            // Mostrar el usuario un mensaje de que existe
            return view('livewire.postulado-mensaje-vacante');
        } else {
            return view('livewire.postular-vacante');
        }
    }
}

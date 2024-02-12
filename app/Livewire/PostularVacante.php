<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use App\Models\Vacante;
use App\Notifications\NuevoCandidato;

class PostularVacante extends Component
{
    use WithFileUploads;
    public $cv;
    public $vacante;
    protected $rules = [
        'cv'=>'required|mimes:pdf'
    ];
    public function mount(Vacante $vacante)
    {
        $this->$vacante = $vacante;
    }
    public function postularme()
    {
        $datos= $this->validate();
        //alamcenar cv en disco duro
        $cv =$this->cv->store('public/cv');
        $datos['cv'] = str_replace('public/cv/','',$cv);
        //crear el candidato
        $this->vacante->candidatos()->create([
            'user_id'=> auth()->user()->id,
            'cv'=>$datos['cv']
        ]);
        //notificaciones



        //mostrar el usuario un mensaje de ok
        session()->flash('mensaje', 'postulado correctamente');
        return redirect()->back();
    }
    public function render()
    {
        return view('livewire.postular-vacante');
    }
}

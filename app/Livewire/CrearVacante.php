<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CrearVacante extends Component
{
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $dia;
   public $descripcion;
    public $imagen;
    use WithFileUploads;
    protected $rules = [
        'titulo'=>'required|string',
        'salario'=>'required',
        'categoria'=>'required',
        'empresa'=>'required',
        'dia'=>'required',
        'descripcion'=>'required',
        'imagen'=>'required|image|max:1024'
    ];

    public function render()
    {
        //Consultar db
        $salarios = Salario::all();
        $categorias = Categoria::all();
        return view('livewire.crear-vacante',[
            'salarios' => $salarios,'categorias'=>$categorias
        ]);
    }
    public function crearVacante()
    {
        $datos = $this->validate();
        //almacenar imagen
        $imagen =$this->imagen->store('public/vacantes');
        $nombre_imagen = str_replace('public/vacantes/','',$imagen);

        //crear vacante
        Vacante::create([
            'titulo'=>$datos['titulo'],
            'salario_id'=>$datos['salario'],
            'categoria_id'=>$datos['categoria'],
            'empresa'=>$datos['empresa'],
            'dia'=>$datos['dia'],
            'descripcion'=>$datos['descripcion'],
            'imagen'=>$nombre_imagen,
            'user_id'=>auth()->user()->id
        ]);

        //crear mensaje
            session()->flash('mensaje','vacante publicada correctamente');
        //redireccionamiento
        return redirect()->route('vacantes.index');
    }
}
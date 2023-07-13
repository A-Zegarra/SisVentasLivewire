<?php

namespace App\Http\Livewire\Categoria;

use App\Models\Categoria;
use Livewire\Component;

class CreateCategoria extends Component
{
    public $open = false;

    public $nombre, $descripcion;

    protected $rules  = [
        'nombre' => 'required',
        'descripcion' => 'nullable',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();




        Categoria::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
        ]);

        $this->reset(['open', 'nombre', 'descripcion']);
        $this->emitTo('categoria.show-categorias', 'render');
        $this->emit('alert', 'La categoria se registró correctamente');
    }
    public function render()
    {
        return view('livewire.categoria.create-categoria');
    }
}

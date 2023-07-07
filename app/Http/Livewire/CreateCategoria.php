<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use Doctrine\Inflector\Rules\English\Rules;
use Livewire\Component;

class CreateCategoria extends Component
{
    public $open = false;
    public $nombre, $descripcion;

    protected $rules  = [
        'nombre' => 'required|max:20',
        'descripcion' => 'required|max:100',
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
            'descripcion' => $this->descripcion
        ]);
        $this->reset(['open', 'nombre', 'descripcion']);
        $this->emitTo('show-categorias', 'render');
        $this->emit('alert', 'La categoria se creó correctamente');
    }

    public function render()
    {
        return view('livewire.create-categoria');
    }
}

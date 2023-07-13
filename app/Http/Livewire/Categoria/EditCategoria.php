<?php

namespace App\Http\Livewire\Categoria;

use App\Models\Categoria;
use Livewire\Component;

class EditCategoria extends Component
{
    public $open = false;
    public $categoria;

    protected $rules = [
        'categoria.nombre' => 'nullable',
        'categoria.descripcion' => 'nullable',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount(Categoria $categoria)
    {
        $this->categoria = $categoria;
    }

    public function save()
    {
        $this->validate();
        $this->categoria->save();
        $this->emitTo('categoria.show-categorias', 'render');
        $this->emit('alert', 'La categoria se actualizo correctamente');
    }
    
    public function render()
    {
        return view('livewire.categoria.edit-categoria');
    }
}

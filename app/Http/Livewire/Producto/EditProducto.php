<?php

namespace App\Http\Livewire\Producto;

use App\Models\Categoria;
use App\Models\Producto;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProducto extends Component
{
    use WithFileUploads;

    public $open = false;
    public $producto, $foto, $identificador, $categoria_id;

    protected $rules = [
        'producto.codigo' => 'required',
        'producto.nombre' => 'required',
        'producto.descripcion' => 'required',
        'producto.cantidad_caja' => 'nullable',
        'producto.costo' => 'nullable',
        'producto.precio_menor' => 'nullable',
        'producto.precio_mayor' => 'nullable',
        'producto.tipo_medida' => 'nullable',
        'producto.foto' => 'nullable',
        'categoria_id' => 'nullable'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount(Producto $producto)
    {
        $this->producto = $producto;
        $this->categoria_id = $producto->categoria_id;
        $this->identificador = rand();
    }
    public function save()
    {

        $this->validate();

        if ($this->foto) {
            Storage::delete([$this->producto->foto]);
            $this->producto->foto = $this->foto->store('producto');
        }


        $this->producto->save();
        $this->reset(['open', 'foto']);
        $this->identificador = rand();
        $this->emitTo('producto.show-producto', 'render');
        $this->emit('alert', 'El producto se actualizo correctamente');
    }

    public function render()
    {
        $categorias = Categoria::all();
        return view('livewire.producto.edit-producto', compact('categorias'));
    }
}

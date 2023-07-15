<?php

namespace App\Http\Livewire\Producto;

use App\Models\Producto;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProducto extends Component
{
    use WithFileUploads;
    public $open = false;
    public $identificador, $codigo, $nombre, $descripcion, $cantidad_caja, $costo, $precio_menor, $precio_mayor, $tipo_medida, $foto;

    public function mount()
    {
        $this->identificador = rand();
    }

    protected $rules  = [
        'codigo' => 'required',
        'nombre' => 'required',
        'foto' => 'nullable',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();


        if ($this->foto) {
            $foto = $this->foto->store('producto');
        } else {
            $foto = 'predefinidas/sinImagen.png';
        }


        Producto::create([
            'codigo' => $this->codigo,
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'cantidad_caja' => $this->cantidad_caja,
            'costo' => $this->costo,
            'precio_menor' => $this->precio_menor,
            'precio_mayor' => $this->precio_mayor,
            'tipo_medida' => $this->tipo_medida,
            'foto' => $foto,
        ]);

        $this->reset(['open', 'codigo', 'nombre', 'descripcion', 'cantidad_caja', 'costo', 'precio_menor', 'precio_mayor', 'tipo_medida', 'foto']);
        $this->identificador = rand();
        $this->emitTo('producto.show-producto', 'render');
        $this->emit('alert', 'El producto se registró correctamente');
    }

    public function render()
    {
        return view('livewire.producto.create-producto');
    }
}

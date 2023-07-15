<?php

namespace App\Http\Livewire\Proveedor;

use App\Models\Proveedor;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProveedor extends Component
{
    use WithFileUploads;

    public $open = false;
    public $proveedor, $foto, $identificador;

    protected $rules = [
        'proveedor.nombre' => 'nullable',
        'proveedor.razon_social' => 'nullable',
        'proveedor.tipo_documento' => 'nullable',
        'proveedor.nro_documento' => 'required|max:11',
        'proveedor.correo' => 'nullable',
        'proveedor.telefono' => 'nullable',
        'proveedor.pais' => 'nullable',
        'proveedor.ciudad' => 'nullable',
        'proveedor.nacimiento' => 'nullable',
        'proveedor.foto' => 'nullable',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount(Proveedor $proveedor)
    {
        $this->proveedor = $proveedor;
        $this->identificador = rand();
    }
    public function save()
    {

        $this->validate();

        if ($this->foto) {
            Storage::delete([$this->proveedor->foto]);
            $this->proveedor->foto = $this->foto->store('proveedor');
        }


        $this->proveedor->save();
        $this->reset(['open', 'foto']);
        $this->identificador = rand();
        $this->emitTo('proveedor.show-proveedor', 'render');
        $this->emit('alert', 'El proveedor se actualizo correctamente');
    }

    public function render()
    {
        return view('livewire.proveedor.edit-proveedor');
    }
}

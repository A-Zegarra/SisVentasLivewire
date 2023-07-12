<?php

namespace App\Http\Livewire\Cliente;

use App\Models\Cliente;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditCliente extends Component
{
    use WithFileUploads;

    public $open = false;
    public $cliente, $foto, $identificador;

    protected $rules = [
        'cliente.nombre' => 'nullable',
        'cliente.razon_social' => 'nullable',
        'cliente.tipo_documento' => 'nullable',
        'cliente.nro_documento' => 'required|max:11',
        'cliente.correo' => 'nullable',
        'cliente.telefono' => 'nullable',
        'cliente.pais' => 'nullable',
        'cliente.ciudad' => 'nullable',
        'cliente.nacimiento' => 'nullable',
        'cliente.foto' => 'nullable',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount(Cliente $cliente)
    {
        $this->cliente = $cliente;
        $this->identificador = rand();
    }
    public function save()
    {

        $this->validate();

        if ($this->foto) {
            Storage::delete([$this->cliente->foto]);
            $this->cliente->foto = $this->foto->store('cliente');
        }


        $this->cliente->save();
        $this->reset(['open', 'foto']);
        $this->identificador = rand();
        $this->emitTo('cliente.show-clientes', 'render');
        $this->emit('alert', 'El cliente se actualizo correctamente');
    }

    public function render()
    {
        return view('livewire.cliente.edit-cliente');
    }
}

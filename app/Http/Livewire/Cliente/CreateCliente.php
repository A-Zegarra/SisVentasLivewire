<?php

namespace App\Http\Livewire\Cliente;

use App\Models\Cliente;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateCliente extends Component
{
    use WithFileUploads;
    public $open = false;
    public $identificador, $nombre, $razon_social, $tipo_documento, $nro_documento, $correo, $telefono, $pais, $ciudad, $nacimiento, $foto;

    public function mount()
    {
        $this->identificador = rand();
    }

    protected $rules  = [
        'nombre' => 'required|max:30',
        'nro_documento' => 'required|max:20',
    ];

    /*  VALIDACION EN TIEMPO REAL
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    } */

    public function save()
    {
        $this->validate();
        $foto = $this->foto->store('clientes');

        Cliente::create([
            'nombre' => $this->nombre,
            'razon_social' => $this->razon_social,
            'tipo_documento' => $this->tipo_documento,
            'nro_documento' => $this->nro_documento,
            'correo' => $this->correo,
            'telefono' => $this->telefono,
            'pais' => $this->pais,
            'ciudad' => $this->ciudad,
            'nacimiento' => $this->nacimiento,
            'foto' => $foto,

        ]);

        $this->reset(['open', 'nombre', 'razon_social', 'tipo_documento', 'nro_documento', 'correo', 'telefono', 'pais', 'ciudad', 'nacimiento', 'foto']);
        $this->identificador = rand();
        $this->emitTo('cliente.show-clientes', 'render');
        $this->emit('alert', 'El cliente se registró correctamente');
    }

    public function render()
    {
        return view('livewire.cliente.create-cliente');
    }
}

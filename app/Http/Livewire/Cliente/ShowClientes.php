<?php

namespace App\Http\Livewire\Cliente;

use App\Models\Cliente;
use Livewire\Component;
use Livewire\WithPagination;

class ShowClientes extends Component
{
    use WithPagination;
    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = '10';
    public $readyToLoad = false;

    protected $queryString = [
        'cant' => ['except' => '10'],
        'sort' => ['except' => 'id'],
        'direction' => ['except' => 'desc'],
        'search' => ['except' => ''],
    ];

    protected $listeners = ['render', 'delete'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        if ($this->readyToLoad) {
            $clientes = Cliente::where('nombre', 'like', '%' . $this->search . '%')
                ->orWhere('nro_documento', 'like', '%' . $this->search . '%')
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);
        } else {
            $clientes = [];
        }

        return view('livewire.cliente.show-clientes', compact('clientes'));
    }

    public function loadClientes()
    {
        $this->readyToLoad = true;
    }

    public function order($sort)
    {

        if ($this->sort == $sort) {

            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }
    public function delete(Cliente $cliente)
    {
        $cliente->delete();
    }
}

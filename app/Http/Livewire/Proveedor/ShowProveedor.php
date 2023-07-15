<?php

namespace App\Http\Livewire\Proveedor;

use App\Models\Proveedor;
use Livewire\Component;
use Livewire\WithPagination;

class ShowProveedor extends Component
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
            $proveedors = Proveedor::where('nombre', 'like', '%' . $this->search . '%')
                ->orWhere('nro_documento', 'like', '%' . $this->search . '%')
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);
        } else {
            $proveedors = [];
        }

        return view('livewire.proveedor.show-proveedor', compact('proveedors'));
    }
    public function loadProveedores()
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
    public function delete(Proveedor $proveedor)
    {
        $proveedor->delete();
    }
}

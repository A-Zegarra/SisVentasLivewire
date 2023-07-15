<?php

namespace App\Http\Livewire\Producto;

use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination;

class ShowProducto extends Component
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
            $productos = Producto::where('descripcion', 'like', '%' . $this->search . '%')
                ->orWhere('codigo', 'like', '%' . $this->search . '%')
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);
        } else {
            $productos = [];
        }

        return view('livewire.producto.show-producto', compact('productos'));
    }
    public function loadProductos()
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
    public function delete(Producto $producto)
    {
        $producto->delete();
    }
}

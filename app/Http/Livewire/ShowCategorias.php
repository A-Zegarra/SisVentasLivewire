<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria;

class ShowCategorias extends Component
{
    public $search;
    public $sort = 'id';
    public $direction = 'desc';

    protected $listeners = ['render' => 'render'];

    public function render()
    {
        $categorias = Categoria::where('nombre', 'like', '%' . $this->search . '%')
            ->orWhere('descripcion', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->get();
        return view('livewire.show-categorias', compact('categorias'));
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
}

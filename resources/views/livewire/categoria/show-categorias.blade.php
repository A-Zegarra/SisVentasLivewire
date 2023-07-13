<div wire:init='loadCategorias'>
    {{-- DASHBOARD --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        {{-- CONTENEDOR DE BUSCADOR --}}
        <div class="px-6 py-4 flex items-center">
            <div class="flex items-center">
                <span>Mostrar</span>
                <select wire:model='cant' class="mx-2 form-control rounded border-gray-300">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <span>Entradas</span>
            </div>

            <x-input class="flex-1 mx-4" placeholder="Escriba lo que quiere buscar" type="search"
                wire:model="search" />
            @livewire('categoria.create-categoria')
        </div>
        {{-- TABLA PRINCIPAL --}}
        <div class="overflow-x-auto">
            @if (count($categorias))
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('id')">
                                id
                                @if ($sort == 'id')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th scope="col"
                                class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('nombre')">
                                nombre
                                @if ($sort == 'nombre')
                                    @if ($direction == 'asc')
                                        <i class="fa-solid fa-arrow-up-z-a float-right mt-1"></i>
                                    @else
                                        <i class="fa-solid fa-arrow-down-z-a float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th scope="col"
                                class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('descripcion')">
                                descripcion
                                @if ($sort == 'descripcion')
                                    @if ($direction == 'asc')
                                        <i class="fa-solid fa-arrow-up-z-a float-right mt-1"></i>
                                    @else
                                        <i class="fa-solid fa-arrow-down-z-a float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th scope="col"
                                class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                opciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($categorias as $categoria)
                            <tr>
                                <td class="px-6 py-4">{{ $categoria->id }}</td>
                                <td class="px-6 py-4">{{ $categoria->nombre }}</td>
                                <td class="px-6 py-4">{{ $categoria->descripcion }}</td>
                                <td class="px-6 py-4 ext-sm font-medium flex float-right">
                                    @livewire('categoria.edit-categoria', ['categoria' => $categoria], key($categoria->id))
                                    <button
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-3 rounded ml-2"
                                        wire:click="$emit('deleteCategoria',{{ $categoria->id }})">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
        @if ($categorias->hasPages())
            <div class="px-6 py-3">
                {{ $categorias->links() }}
            </div>
        @endif
    @else
        <div class="px-6 py-4">
            No existe ningun registro coincidente
        </div>
        @endif
        @push('js')
            <script>
                Livewire.on('deleteCategoria', categoriaId => {
                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: "¡No podrás revertir esto!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sí, eliminarlo!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Livewire.emitTo('categoria.show-categorias', 'delete', categoriaId);
                            Swal.fire(
                                '¡Eliminado!',
                                'Tu registro ha sido eliminado.',
                                'éxito'
                            )
                        }
                    })
                })
            </script>
        @endpush

    </div>
</div>

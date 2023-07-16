<div wire:init='loadProductos'>
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
            @livewire('producto.create-producto')
        </div>
        {{-- TABLA PRINCIPAL --}}
        <div class="overflow-x-auto">
            @if (count($productos))
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
                                wire:click="order('codigo')">
                                codigo
                                @if ($sort == 'codigo')
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
                                class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                descripcion
                            </th>

                            <th scope="col"
                                class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                cant. caja
                            </th>

                            <th scope="col"
                                class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                costo
                            </th>

                            <th scope="col"
                                class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                precio menor
                            </th>

                            <th scope="col"
                                class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                precio mayor
                            </th>

                            <th scope="col"
                                class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                medida
                            </th>

                            <th scope="col"
                                class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                foto
                            </th>

                            <th scope="col"
                                class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                categoria
                            </th>

                            <th scope="col"
                                class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                opciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($productos as $producto)
                            <tr>
                                <td class="px-6 py-4">{{ $producto->id }}</td>
                                <td class="px-6 py-4">{{ $producto->codigo }}</td>
                                <td class="px-6 py-4">{{ $producto->nombre }}</td>
                                <td class="px-6 py-4">{{ $producto->descripcion }}</td>
                                <td class="px-6 py-4">{{ $producto->cantidad_caja }}</td>
                                <td class="px-6 py-4">{{ $producto->costo }}</td>
                                <td class="px-6 py-4">{{ $producto->precio_menor }}</td>
                                <td class="px-6 py-4">{{ $producto->precio_mayor }}</td>
                                <td class="px-6 py-4">{{ $producto->tipo_medida }}</td>
                                <td class="px-1 py-4"><img src="{{ Storage::url($producto->foto) }}"></td>
                                <td class="px-6 py-4">{{ $producto->categoria->nombre }}</td>

                                <td class="px-6 py-4 ext-sm font-medium flex">
                                    @livewire('producto.edit-producto', ['producto' => $producto], key($producto->id))
                                    <button
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-3 rounded ml-2"
                                        wire:click="$emit('deleteProducto',{{ $producto->id }})">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>

        @if ($productos->hasPages())
            <div class="px-6 py-3">
                {{ $productos->links() }}
            </div>
        @endif
    @else
        <div class="px-6 py-4">
            No coincide con ningún registro.
        </div>
        @endif

        @push('js')
            <script>
                Livewire.on('deleteProducto', productoId => {
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
                            Livewire.emitTo('producto.show-producto', 'delete', productoId);
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

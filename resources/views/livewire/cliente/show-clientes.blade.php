<div wire:init='loadClientes'>
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
            @livewire('cliente.create-cliente')
        </div>
        {{-- TABLA PRINCIPAL --}}
        <div class="overflow-x-auto">
            @if (count($clientes))
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
                                wire:click="order('razon_social')">
                                r. social
                                @if ($sort == 'razon_social')
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
                                tipo documento
                            </th>

                            <th scope="col"
                                class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                nro documento
                            </th>

                            <th scope="col"
                                class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                correo
                            </th>

                            <th scope="col"
                                class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                telefono
                            </th>

                            <th scope="col"
                                class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                pais
                            </th>

                            <th scope="col"
                                class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ciudad
                            </th>

                            <th scope="col"
                                class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                nacimiento
                            </th>

                            <th scope="col"
                                class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                foto
                            </th>

                            <th scope="col"
                                class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                opciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td class="px-6 py-4">{{ $cliente->id }}</td>
                                <td class="px-6 py-4">{{ $cliente->nombre }}</td>
                                <td class="px-6 py-4">{{ $cliente->razon_social }}</td>
                                <td class="px-6 py-4">{{ $cliente->tipo_documento }}</td>
                                <td class="px-6 py-4">{{ $cliente->nro_documento }}</td>
                                <td class="px-6 py-4">{{ $cliente->correo }}</td>
                                <td class="px-6 py-4">{{ $cliente->telefono }}</td>
                                <td class="px-6 py-4">{{ $cliente->pais }}</td>
                                <td class="px-6 py-4">{{ $cliente->ciudad }}</td>
                                <td class="px-6 py-4">{{ $cliente->nacimiento }}</td>
                                <td class="px-1 py-4"><img src="{{ Storage::url($cliente->foto) }}"></td>

                                <td class="px-6 py-4 ext-sm font-medium flex">
                                    @livewire('cliente.edit-cliente', ['cliente' => $cliente], key($cliente->id))
                                    <button
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-3 rounded ml-2"
                                        wire:click="$emit('deleteCliente',{{ $cliente->id }})">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>

        @if ($clientes->hasPages())
            <div class="px-6 py-3">
                {{ $clientes->links() }}
            </div>
        @endif
    @else
        <div class="px-6 py-4">
            No coincide con ningún registro.
        </div>
        @endif

        @push('js')
            <script>
                Livewire.on('deleteCliente', clienteId => {
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
                            Livewire.emitTo('cliente.show-clientes', 'delete', clienteId);
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

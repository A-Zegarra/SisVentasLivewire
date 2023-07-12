<div>
    {{-- DASHBOARD --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12"> --}}
    {{-- CONTENEDOR DE BUSCADOR --}}
    <div class="px-6 py-4 flex items-center">
        <x-input class="flex-1 mr-4" placeholder="Escriba lo que quiere buscar" type="search" wire:model="search" />
        @livewire('cliente.create-cliente')
    </div>
    {{-- TABLA PRINCIPAL --}}
    <div class="overflow-x-auto">
        @if ($clientes->count())
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

                        {{-- <th scope="col"
                            class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            tipo documento
                        </th> --}}

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

                       {{--  <th scope="col"
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
 --}}
                        <th colspan="3" scope="col"
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
                            {{-- <td class="px-6 py-4">{{ $cliente->tipo_documento }}</td> --}}
                            <td class="px-6 py-4">{{ $cliente->nro_documento }}</td>
                            <td class="px-6 py-4">{{ $cliente->correo }}</td>
                            <td class="px-6 py-4">{{ $cliente->telefono }}</td>
                            {{-- <td class="px-6 py-4">{{ $cliente->pais }}</td>
                            <td class="px-6 py-4">{{ $cliente->ciudad }}</td>
                            <td class="px-6 py-4">{{ $cliente->nacimiento }}</td>
                            <td class="px-1 py-4"><img src="{{ Storage::url($cliente->foto) }}"></td> --}}
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Ver</a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                @livewire('cliente.edit-cliente', ['cliente' => $cliente], key($cliente->id))
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
@else
    <div class="px-6 py-4">
        No coincide con ningún registro.
    </div>
    @endif
</div>









</div>

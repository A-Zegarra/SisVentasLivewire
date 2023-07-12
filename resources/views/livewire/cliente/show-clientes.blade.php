<div>
    {{-- DASHBOARD --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12"> --}}
    {{-- CONTENEDOR DE BUSCADOR --}}
    <div class="py-6 py-4 flex items-center">
        <x-input class="flex-1 mr-4" placeholder="Escriba lo que quiere buscar" type="search" wire:model="search" />
        @livewire('cliente.create-cliente')
    </div>
    {{-- TABLA PRINCIPAL --}}
    <div class="overflow-x-scroll">
        @if ($clientes->count())
            <table class="min-w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 ">
                    <tr>
                        <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="order('id')">
                            <span>id</span>
                            @if ($sort == 'id')
                                @if ($direction == 'asc')
                                    <i class="fa-solid fa-arrow-up-z-a float-right mt-1"></i>
                                @else
                                    <i class="fa-solid fa-arrow-down-z-a float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>

                        <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="order('nombre')">
                            <span>nombre</span>
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

                        <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="order('razon_social')">
                            <span>razon social</span>
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

                        <th scope="col" class="px-6 py-3">
                            <span>tipo documento</span>
                        </th>

                        <th scope="col" class="px-6 py-3">
                            <span>nro documento</span>
                        </th>

                        <th scope="col" class="px-6 py-3">
                            <span>correo</span>
                        </th>

                        <th scope="col" class="px-6 py-3">
                            <span>telefono</span>
                        </th>

                        {{-- <th scope="col" class="px-6 py-3">
                            <span>pais</span>
                        </th>

                        <th scope="col" class="px-6 py-3">
                            <span>ciudad</span>
                        </th>

                        <th scope="col" class="px-6 py-3">
                            <span>nacimiento</span>
                        </th>

                        <th scope="col" class="px-6 py-3">
                            <span>foto</span>
                        </th> --}}

                        <th colspan="3" scope="col" class="px-6 py-3">opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                {{ $cliente->id }}</th>
                            <td class="px-6 py-4">{{ $cliente->nombre }}</td>
                            <td class="px-6 py-4">{{ $cliente->razon_social }}</td>
                            <td class="px-6 py-4">{{ $cliente->tipo_documento }}</td>
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
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
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

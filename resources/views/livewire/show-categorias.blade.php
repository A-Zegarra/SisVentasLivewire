<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="py-6 py-4 flex items-center">
            <x-input class="flex-1 mr-4" placeholder="Escriba lo que quiere buscar" type="search" wire:model="search" />
            @livewire('create-categoria')
        </div>
        @if ($categorias->count())
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
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

                        <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="order('descripcion')">
                            <span>descripcion</span>
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

                        <th colspan="3" scope="col" class="px-6 py-3">opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $categoria)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                {{ $categoria->id }}</th>
                            <td class="px-6 py-4">{{ $categoria->nombre }}</td>
                            <td class="px-6 py-4">{{ $categoria->descripcion }}</td>
                            <td class="px-6 py-4">Ver</td>
                            <td class="px-6 py-4">Editar</td>
                            <td class="px-6 py-4">Eliminar</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="px-6 py-4">
                No coincide con ningún registro.
            </div>
        @endif
    </div>  
</div>

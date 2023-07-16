<div>
    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-3 rounded ml-2"
        wire:click="$set('open',true)">
        <i class="fa fa-edit"></i>
    </button>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Editar Producto
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-label value="Codigo"></x-label>
                <x-input type="text" class="w-full" wire:model="producto.codigo" />
            </div>

            <div class="mb-4">
                <x-label value="Nombre"></x-label>
                <x-input type="text" class="w-full" wire:model="producto.nombre" />
            </div>

            <div class="mb-4">
                <x-label value="Descripcion"></x-label>
                <x-input type="text" class="w-full" wire:model.defer="producto.descripcion" />
            </div>

            <div class="mb-4 flex">
                <div class="mb-4 mr-4">
                    <x-label value="Costo"></x-label>
                    <x-input type="text" class="w-full" wire:model.defer="producto.costo" />
                </div>

                <div class="mb-4 mr-4">
                    <x-label value="Precio por menor"></x-label>
                    <x-input type="text" class="w-full" wire:model.defer="producto.precio_menor" />
                </div>

                <div class="mb-4">
                    <x-label value="Precio por mayor"></x-label>
                    <x-input type="text" class="w-full" wire:model.defer="producto.precio_mayor" />
                </div>
            </div>

            <div class="mb-4 flex">
                <div class="mb-4 mr-4">
                    <x-label value="Cantidad por caja"></x-label>
                    <x-input type="text" class="w-full" wire:model.defer="producto.cantidad_caja" />
                </div>

                <div class="mb-4 mr-4">
                    <x-label value="Medida"></x-label>
                    <x-select wire:model="producto.tipo_medida">
                        <option value="UNIDAD">UNIDAD</option>
                        <option value="BOLSA">BOLSA</option>
                        <option value="CAJA">CAJA</option>
                        <option value="SET">SET</option>
                    </x-select>
                </div>

                <div class="mb-4 mr-4">
                    <x-label value="Categoria"></x-label>
                    <x-select wire:model="categoria_id">
                        <option value="" selected>Seleccionar...</option>
                        @foreach ($categorias as $categoria)
                            @if ($categoria->id == $producto->categoria_id)
                                <option value="{{ $categoria->id }}" selected>{{ $categoria->nombre }}</option>
                            @else
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endif
                        @endforeach
                    </x-select>
                </div>
            </div>


            <div class="mb-4">
                <x-label value="Foto"></x-label>
                <x-input type="file" class="w-full" wire:model="foto" id="{{ $identificador }}" />
            </div>

            <div wire:loading wire:target="foto"
                class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">¡Imagen cargando!</strong>
                <span class="block sm:inline">Espere un momento hasta que la imagen se haya procesado</span>
            </div>

            @if ($foto)
                <img class="mb-4 w-1/4 h-1/4" src="{{ $foto->temporaryUrl() }}">
            @else
                <img class="mb-4 w-1/4 h-1/4" src="{{ Storage::url($producto->foto) }}">
            @endif

        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-secondary-button>
            <x-danger-button wire:click="save" wire:loading.attr='disabled' class="disabled:opacity-25 ml-4">
                Actualizar
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>

</div>

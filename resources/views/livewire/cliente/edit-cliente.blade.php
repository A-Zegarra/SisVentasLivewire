<div>
    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-3 rounded"
        wire:click="$set('open',true)">
        <i class="fa fa-edit"></i>
    </button>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Editar Cliente
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-label value="Nombre de cliente" />
                <x-input type="text" class="w-full" wire:model="cliente.nombre" />
            </div>
            <div class="mb-4">
                <x-label value="Razon social"></x-label>
                <x-input type="text" class="w-full" wire:model="cliente.razon_social" />
            </div>

            <div class="mb-4 flex">
                <div>
                    <x-label value="Tipo"></x-label>
                    <x-select class="mr-4" wire:model="cliente.tipo_documento">
                        <option value="">Seleccionar...</option>
                        <option value="dni">DNI</option>
                        <option value="ruc">RUC</option>
                    </x-select>
                </div>

                <div class="w-9/12">
                    <x-label value="Nro Documento"></x-label>
                    <x-input type="text" class="w-full" wire:model="cliente.nro_documento" />
                    <x-input-error for='cliente.nro_documento' />
                </div>
            </div>

            <div class="mb-4 flex">
                <div class="w-9/12">
                    <x-label value="Correo"></x-label>
                    <x-input type="email" class="w-full" wire:model="cliente.correo" />
                </div>

                <div class="mb-4 ml-4">
                    <x-label value="Celular"></x-label>
                    <x-input type="tel" class="w-full" wire:model="cliente.telefono" />
                </div>
            </div>

            <div class="mb-4 flex">
                <div class="w-4/12 mr-2">
                    <x-label value="Pais"></x-label>
                    <x-input type="text" class="w-full" wire:model="cliente.pais" />
                </div>

                <div class="w-4/12">
                    <x-label value="Ciudad"></x-label>
                    <x-input type="text" class="w-full" wire:model="cliente.ciudad" />
                </div>

                <div class="w-4/12 ml-2">
                    <x-label value="Nacimiento"></x-label>
                    <x-input type="date" class="w-full" wire:model="cliente.nacimiento" />
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
            <img class="mb-4 w-1/4 h-1/4" src="{{ Storage::url($cliente->foto) }}">
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
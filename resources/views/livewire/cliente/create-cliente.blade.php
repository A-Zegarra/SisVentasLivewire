<div>
    <x-danger-button wire:click="$set('open', true)">
        Crear nuevo cliente
    </x-danger-button>

    <x-dialog-modal wire:model="open">

        <x-slot name="title">
            Crear nuevo cliente
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-label value="Nombre"></x-label>
                <x-input type="text" class="w-full" wire:model="nombre" />
            </div>

            <div class="mb-4">
                <x-label value="Razon social"></x-label>
                <x-input type="text" class="w-full" wire:model.defer="razon_social" />
            </div>

            <div class="mb-4 flex">
                <div class="">
                    <x-label value="Tipo"></x-label>
                    <x-select wire:model.defer="tipo_documento" class="mr-4">
                        <option value="">Seleccionar...</option>
                        <option value="dni">DNI</option>
                        <option value="ruc">RUC</option>
                    </x-select>
                </div>

                <div class="w-9/12">
                    <x-label value="Nro Documento"></x-label>
                    <x-input type="text" wire:model="nro_documento" class="w-full" />
                    <x-input-error for='cliente.nro_documento' />
                </div>
            </div>

            <div class="mb-4 flex">
                <div class="w-9/12">
                    <x-label value="Correo"></x-label>
                    <x-input type="email" class="w-full" wire:model.defer="correo" />
                </div>

                <div class="mb-4 ml-4">
                    <x-label value="Celular"></x-label>
                    <x-input type="tel" class="w-full" wire:model.defer="telefono" />
                </div>
            </div>

            <div class="mb-4 flex">
                <div class="w-4/12 mr-2">
                    <x-label value="Pais"></x-label>
                    <x-input type="text" class="w-full" wire:model.defer="pais" />
                </div>

                <div class="w-4/12">
                    <x-label value="Ciudad"></x-label>
                    <x-input type="text" class="w-full" wire:model.defer="ciudad" />
                </div>

                <div class="w-4/12 ml-2">
                    <x-label value="Nacimiento"></x-label>
                    <x-input type="date" class="w-full" wire:model.defer="nacimiento" />
                </div>
            </div>

            <div wire:loading wire:target="foto"
                class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">¡Imagen cargando!</strong>
                <span class="block sm:inline">Espere un momento hasta que la imagen se haya procesado</span>
            </div>

            @if ($foto)
            <img class="mb-4 w-1/4 h-1/4" src="{{ $foto->temporaryUrl() }}">
            @endif

            <div class="mb-4">
                <x-label value="Foto"></x-label>
                <x-input type="file" class="w-full" wire:model="foto" id="{{ $identificador }}" />
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('open',false)" class="mr-4">
                Cancelar
            </x-secondary-button>
            <x-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save,foto"
                class="disabled:opacity-25">
                Crear cliente
            </x-danger-button>

        </x-slot>

    </x-dialog-modal>
</div>
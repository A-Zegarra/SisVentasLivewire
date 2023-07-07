<div>
    <x-danger-button wire:click="$set('open', true)">
        Crear nueva Categoria
    </x-danger-button>

    <x-dialog-modal wire:model="open">

        <x-slot name="title">
            Crear nuevo post
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-label value="Nombre de Categoria"></x-label>
                <x-input type="text" class="w-full" wire:model="nombre" />
                @error('nombre')
                    <span>
                        <x-input-error for='nombre' />
                    </span>
                @enderror


            </div>
            <div class="mb-4">
                <x-label value="Descripcion"></x-label>
                <x-input type="text" class="w-full" wire:model.defer="descripcion" />
                @error('descripcion')
                    <x-input-error for='descripcion' />
                @enderror
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('open',false)" class="mr-4">
                Cancelar
            </x-secondary-button>
            <x-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25">
                Crear Categoria
            </x-danger-button>

        </x-slot>

    </x-dialog-modal>
</div>

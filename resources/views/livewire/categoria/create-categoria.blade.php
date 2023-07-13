<div>
    <x-danger-button wire:click="$set('open', true)">
        Crear nueva categoria
    </x-danger-button>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Crear Categoria
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-label value="Nombre de categoria" />
                <x-input type="text" class="w-full" wire:model="nombre" />
                <x-input-error for="nombre" />
            </div>

            <div class="mb-4">
                <x-label value="Descripcion"></x-label>
                <x-input type="text" class="w-full" wire:model="descripcion" />
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-secondary-button>
            <x-danger-button wire:click="save" wire:loading.attr='disabled' wire:target="save"
                class="disabled:opacity-25 ml-4">
                Crear categoria
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>

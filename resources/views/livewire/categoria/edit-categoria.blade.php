<div>
    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-3 rounded ml-2"
        wire:click="$set('open',true)">
        <i class="fa fa-edit"></i>
    </button>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Editar Categoria
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-label value="Nombre de categoria" />
                <x-input type="text" class="w-full" wire:model="categoria.nombre" />
            </div>
            <div class="mb-4">
                <x-label value="Descripcion"></x-label>
                <x-input type="text" class="w-full" wire:model="categoria.descripcion" />
            </div>
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

<form wire:submit.prevent="create" method="POST">
    @csrf
    <x-modal>
        <x-slot name="title">Add Category</x-slot>
        <x-slot name="body">
            <div class="flex flex-wrap -mx-3 mb-3">
                <div class="w-full px-3 mb-3">
                    <x-label for="name" :value="__('name')" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus
                        placeholder='HP' wire:model.defer="name" />
                    <x-input-error message='$message' name='name' />
                </div>
            </div>
        </x-slot>
        <x-slot name="save">Save Brand</x-slot>
    </x-modal>
</form>

<form wire:submit.prevent="createTask" method="POST">
    @csrf
    <x-modal>
        <x-slot name="title">Add Task</x-slot>
        <x-slot name="body">
            <div class="flex flex-wrap -mx-3 mb-3">
                <div class="w-full px-3 mb-3">
                    <x-label for="title" :value="__('Title')" />
                    <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required
                        autofocus placeholder='Fix Broken Hinges' wire:model.defer="title" />
                    <x-input-error message='$message' name='title' />
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-3">
                <div class="w-full px-3 mb-3">
                    <x-label for="assigned_to" :value="__('Assign To')" />
                    <x-select required name='assigned_to' wire:model="assigned_to">
                        <option value="" class="uppercase">---Select---</option>
                        @foreach ($users as $item)
                            <option value="{{ $item->id }}" wire:key="{{$item->id}}" class="uppercase">{{ $item->full_name }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error message='$message' name='assigned_to' />
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-3">
                <div class="w-full px-3 mb-3">
                    <x-label for="description" :value="__('Description')" />
                    <textarea name="description" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        rows="3" placeholder="Hinges Broken on both sides of the system" wire:model.defer="description"></textarea>
                    <x-input-error message='$message' name='description' />
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-3">
                <div class="w-full px-3 mb-3">
                    <x-label for="due_date" :value="__('Due Date')" />
                    <x-input id="due_date" class="block mt-1 w-full" type="date" name="due_date"
                        value="{{ old('due_date') }}" required autofocus placeholder='' min="{{ date('Y-m-d') }}"  wire:model.defer="due_date"/>
                    <x-input-error message='$message' name='due_date' />
                </div>
            </div>
        </x-slot>
    </x-modal>

</form>

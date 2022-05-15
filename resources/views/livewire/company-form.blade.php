<form wire:submit.prevent="createCustomer" method="POST">
    @csrf
    <x-modal>
        <x-slot name="title">Add Customer</x-slot>
        <x-slot name="body">

            <div class="flex flex-wrap -mx-3 mb-3">
                <div class="w-1/2 px-3 mb-3">
                    <x-label for="name" :value="__('Name')" />

                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                        autofocus placeholder='John' wire:model.defer="name" />
                    <x-input-error message='$message' name='name' />
                </div>
                <div class="w-1/2 px-3 mb-3">
                    <x-label for="" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                        autofocus placeholder='johndoe@gmail.com' wire:model.defer="email" />
                    <x-input-error message='$message' name='email' />
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-3">
                <!-- Name -->
                <div class="w-1/2 px-3 mb-3">
                    <x-label for="email" :value="__('Phone Number')" />

                    <x-input id="email" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number')"
                        required placeholder='23490874747' wire:model.defer="phone_number" />
                    <x-input-error message='$message' name='phone_number' />
                </div>
                <div class="w-1/2 px-3 mb-3">

                    <x-label for="role" :value="__('Type')" />
                    <x-select required name='type' wire:model="type">
                        <option value="" class="uppercase">---Select---</option>
                        @foreach ($types as $item)
                            <option value="{{ $item['value'] }}" wire:key="{{ $item['value'] }}"
                                class="uppercase">{{ $item['name'] }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error message='$message' name='type' />
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-3">
                <div class="w-full px-3 mb-3">
                    <x-label for="address" :value="__('Address')" />
                    <textarea name="address" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        rows="3" placeholder="3908, Odogbolu street, Ikotun" wire:model.defer="address"></textarea>
                    <x-input-error message='$message' name='address' />
                </div>
            </div>

        </x-slot>
    </x-modal>

</form>

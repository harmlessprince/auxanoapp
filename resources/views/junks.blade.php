  {{-- <!-- Modal backdrop. This what you want to place close to the closing body tag -->
    <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-start sm:justify-center">
        <!-- Modal -->
        <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal"
            @keydown.escape="closeModal"
            class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
            role="dialog" id="modal">
            <form method="POST" action="{{ route('customers.store') }}">
                <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
                <header class="flex justify-between">
                    <!-- Modal title -->
                    <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                        Add Customer
                    </p>
                    <button
                        class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                        aria-label="close" @click="closeModal">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                            <path
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>

                    </button>
                </header>
                <!-- Modal body -->
                <div class="mt-4 mb-6">


                    @csrf
                    <div class="flex flex-wrap -mx-3 mb-3">
                        <div class="w-1/2 px-3 mb-3">
                            <x-label for="name" :value="__('Name')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                                required autofocus placeholder='John' />
                            <x-input-error message='$message' name='name' />
                        </div>
                        <div class="w-1/2 px-3 mb-3">
                            <x-label for="" :value="__('Email')" />

                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                                required autofocus placeholder='johndoe@gmail.com' />
                            <x-input-error message='$message' name='email' />
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-3">
                        <!-- Name -->
                        <div class="w-1/2 px-3 mb-3">
                            <x-label for="email" :value="__('Phone Number')" />

                            <x-input id="email" class="block mt-1 w-full" type="text" name="phone_number"
                                :value="old('phone_number')" required placeholder='23490874747' />
                            <x-input-error message='$message' name='email' />
                        </div>
                        <div class="w-1/2 px-3 mb-3">
                            <x-label for="role" :value="__('Type')" />
                            <x-select required name='type'>
                                <option value="" class="uppercase">---Select---</option>

                                @foreach ($types as $type)
                                    <option value="{{ $type->value }}" class="uppercase">{{ $type->name }}</option>
                                @endforeach
                            </x-select>
                            <x-input-error message='$message' name='role' />
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-3">
                        <div class="w-full px-3 mb-3">
                            <x-label for="address" :value="__('Address')" />
                            <textarea name="address"
                                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                rows="3" placeholder="3908, Odogbolu street, Ikotun"></textarea>
                        </div>
                    </div>

                </div>
                <footer
                    class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                    <button @click="closeModal" type="button"
                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-black text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                        Cancel
                    </button>
                    <button type="submit"
                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Accept
                    </button>
                </footer>
            </form>
        </div>
    </div> --}}
    <!-- End of modal backdrop -->


        {{-- @push('scripts')
        <script type="text/javascript">
            function deleteUser(customer, url) {
                const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                swal({
                        title: `Are you sure, you want to delete ${customer.first_name} ${customer.last_name}?`,
                        text: `${customer.first_name}!`,
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((status) => {
                        // console.log(status);
                        if (!status) {
                            throw null;
                        }
                        return fetch(url, {
                            headers: {
                                "Content-Type": "application/json",
                                // "Accept": "application/json, text-plain, */*",
                                "X-Requested-With": "XMLHttpRequest",
                                "X-CSRF-TOKEN": token
                            },
                            method: 'delete',
                            credentials: "same-origin",
                            // body: JSON.stringify(customer)
                        });
                    }).then(results => {
                        return results.json();
                    }).then(data => {
                        if (data.success === true) {
                            return swal(data.message, {
                                icon: "success",
                            }).then(() => location.reload());
                        } else {
                            swal(data.message, {
                                icon: "error",
                            });
                        }
                    })
                    .catch(err => {
                        if (err) {
                            console.log(err)
                            swal("Oh noes!", "The request failed!", "error");
                        } else {
                            swal.stopLoading();
                            swal.close();
                        }
                    });
            }
        </script>
    @endpush --}}

    {{-- onclick="deleteUser(customer = {{ json_encode($customer->toArray()) }}, url = {{ json_encode(route('customers.destroy', ['customer' => $customer])) }})" --}}
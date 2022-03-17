@extends('layouts.app')
@section('page')
    Edit Customer
@endsection

@section('content')
    {{-- {{Session::get('info')}} --}}
    <div class="flex flex-col w-3/4 mx-auto bg-white rounded-lg shadow-xl dark:bg-gray-800 p-5">
        <form method="POST" action="{{ route('customers.update', ['customer' => $customer]) }}">
            @method('PATCH')
            @csrf
            <div class="flex flex-wrap -mx-3 mb-3">
                <div class="w-1/2 px-3 mb-3">
                    <x-label for="name" :value="__('Name')" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$customer->name" required
                        autofocus placeholder='John'/>
                    <x-input-error message='$message' name='name' />
                </div>
                <div class="w-1/2 px-3 mb-3">
                    <x-label for="" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$customer->email" required
                        autofocus placeholder='johndoe@gmail.com' />
                    <x-input-error message='$message' name='email' />
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-3">
                <!-- Name -->
                <div class="w-1/2 px-3 mb-3">
                    <x-label for="email" :value="__('Phone Number')" />

                    <x-input id="email" class="block mt-1 w-full" type="text" name="phone_number"
                        :value="$customer->phone_number" required placeholder='23490874747' />
                    <x-input-error message='$message' name='phone_number' />
                </div>
                <div class="w-1/2 px-3 mb-3">

                    <x-label for="role" :value="__('Type')" />
                    <x-select required name='type'>
                        <option value="" class="uppercase">---Select---</option>
                        @foreach ($customerTypes as $item)
                            <option value="{{ $item['value'] }}" class="uppercase" @if ($customer->type == $item['value']) selected @endif>
                                {{ $item['name'] }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error message='$message' name='type' />
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-3">
                <div class="w-full px-3 mb-3">
                    <x-label for="address" :value="__('Address')" />
                    <textarea name="address" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        rows="3" placeholder="3908, Odogbolu street, Ikotun">{{$customer->address}}</textarea>
                    <x-input-error message='$message' name='address' />
                </div>
            </div>

            <div class="flex justify-end">
                <x-button>
                    Update
                </x-button>
            </div>

        </form>
    </div>
@endsection

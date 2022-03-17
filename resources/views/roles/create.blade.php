@extends('layouts.app')
@section('page')
    Create User
@endsection

@section('content')
    <div class="flex flex-col w-3/4 mx-auto bg-white rounded-lg shadow-xl dark:bg-gray-800 p-5">
        <form class="w-full">
            <div class="flex flex-wrap -mx-3 mb-3">
                <!-- Name -->
                <div class="w-1/2 px-3 mb-3">
                    <x-label for="name" :value="__('FIRST NAME')" />

                    <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('first_name')"
                        required autofocus />
                </div>
                <div class="w-1/2 px-3 mb-3">
                    <x-label for="" :value="__('LAST NAME')" />

                    <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                        :value="old('last_name')" required autofocus />
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-3">
                <!-- Name -->
                <div class="w-1/2 px-3 mb-3">
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>
                <div class="w-1/2 px-3 mb-3">
                    <x-label for="role" :value="__('Role')" />
                    <x-select required>
                        <option>New Mexico</option>
                        <option>Missouri</option>
                        <option>Texas</option>
                    </x-select>
                </div>
            </div>
            <div class="flex flex-wrap mb-6">
                <div class="w-full">
                    <x-label for="" :value="__('password')" />

                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autofocus
                        placeholder="******************" />

                </div>
            </div>
            <div class="flex justify-end">
                <x-button>
                    Save
                </x-button>
            </div>

        </form>
    </div>
@endsection

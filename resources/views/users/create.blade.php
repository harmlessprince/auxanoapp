@extends('layouts.app')
@section('page')
    Create User
@endsection

@section('content')
    <div class="flex flex-col w-3/4 mx-auto bg-white rounded-lg shadow-xl dark:bg-gray-800 p-5">

        <form method="POST" action="{{ route('users.store') }}">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-3">
                <!-- Name -->
                <div class="w-1/2 px-3 mb-3">
                    <x-label for="first_name" :value="__('FIRST NAME')" />

                    <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                        :value="old('first_name')" required autofocus placeholder='John' />
                    <x-input-error message='$message' name='first_name' />
                </div>
                <div class="w-1/2 px-3 mb-3">
                    <x-label for="" :value="__('LAST NAME')" />

                    <x-input id="first_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')"
                        required autofocus placeholder='Doe' />
                    <x-input-error message='$message' name='last_name' />
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-3">
                <!-- Name -->
                <div class="w-1/2 px-3 mb-3">
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                        placeholder='johndoe@auxano.com' />
                    <x-input-error message='$message' name='email' />
                </div>
                <div class="w-1/2 px-3 mb-3">
                    <x-label for="role" :value="__('Role')" />
                    <x-select required name='role'>
                        <option value="" class="uppercase">---Select---</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" class="uppercase">{{ $role->name }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error message='$message' name='role' />
                </div>
            </div>
            <div class="flex -mx-3 mb-3">
                <div class="w-full px-3 mb-3">
                    <x-label for="" :value="__('Phone Number')" />
                    <x-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" required autofocus
                        placeholder="07086536372" />
                    <x-input-error message='$message' name='phone_number' />
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-3">
                <div class="w-1/2 px-3 mb-3">
                    <x-label for="" :value="__('password')" />

                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autofocus
                        placeholder="******************" />
                    <x-input-error message='$message' name='password' />
                </div>
                <div class="w-1/2 px-3 mb-3">
                    <x-label for="" :value="__('Confirm Password')" />
                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required autofocus placeholder="******************" />
                    <x-input-error message='$message' name='password_confirmation' />
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

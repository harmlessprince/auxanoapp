@extends('layouts.app')
@section('page')
    Create Ticket
@endsection

@section('content')
    {{-- {{Session::get('info')}} --}}
    <div class="flex flex-col w-3/4 mx-auto bg-white rounded-lg shadow-xl dark:bg-gray-800 p-5">
        <form method="POST" action="{{ route('tickets.store') }}">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-3">
                <div class="w-full px-3 mb-3">
                    <x-label for="subject" :value="__('Ticket Name')" />
                    <x-input id="ticket_name" class="block mt-1 w-full" type="text" name="ticket_name"
                        value="{{ old('ticket_name') }}" required autofocus placeholder='' />
                    <x-input-error message='$message' name='ticket_name' />
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-3">
                <!-- status -->
                <div class="w-1/3 px-3 mb-3">
                    <x-label for="role" :value="__('Status')" />
                    <x-select required name='status'>
                        <option value="" class="uppercase">---Select Status--</option>
                        @foreach ($statuses as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error message='$message' name='status' />
                </div>
                <div class="w-1/3 px-3 mb-3">
                    <x-label for="role" :value="__('Priority')" />
                    <x-select required name='priority'>
                        <option value="" class="uppercase">---Select Priority---</option>
                        @foreach ($priorities as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error message='$message' name='priority' />
                </div>
                <div class="w-1/3 px-3 mb-3">
                    <x-label for="category" :value="__('Category')" />
                    <x-select required name='category'>
                        <option value="" class="uppercase">---Select Category---</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </x-select>
                    <x-input-error message='$message' name='category' />
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-3">
                <!-- status -->
                <div class="w-full px-3 mb-3">
                    <x-label for="customer" :value="__('Customer')" />
                    <x-select required name='customer'>
                        <option value="" class="">---Select---</option>
                        @foreach ($customers as $item)
                            <option value="{{ $item->id }}">{{ $item->name }} -------- {{ $item->email }}
                            </option>
                        @endforeach
                    </x-select>
                    <x-input-error message='$message' name='customer' />
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-3">
                <!-- status -->
                <div class="w-full px-3 mb-3">
                    <x-label for="assign_to" :value="__('Assign To')" />
                    <x-select required name='assign_to'>
                        <option value="" class="">---Select---</option>
                        @foreach ($users as $item)
                            <option value="{{ $item->id }}">{{ $item->first_name }} {{ $item->last_name }}
                            </option>
                        @endforeach
                    </x-select>
                    <x-input-error message='$message' name='assign_to' />
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-3">
                <div class="w-full px-3 mb-3">
                    <x-label for="fault_reported" :value="__('Fault Reported')" />
                    <textarea name="fault_reported"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        rows="3" placeholder="Windows not booting"></textarea>
                    <x-input-error message='$message' name='fault_reported' />
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-3">
                <div class="w-full px-3 mb-3">
                    <x-label for="fault_observed" :value="__('Fault Observed')" />
                    <textarea name="fault_observed"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        rows="3" placeholder="Broken Screen"></textarea>
                    <x-input-error message='$message' name='fault_observed' />
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-3">
                <!-- status -->
                <div class="w-full px-3 mb-3">
                    <x-label for="due_date" :value="__('Due Date')" />
                    <x-input id="due_date" class="block mt-1 w-full" type="date" name="due_date"
                        value="{{ old('due_date') }}" required autofocus placeholder='' min=" {{ date('Y-m-d')}}" />
                    <x-input-error message='$message' name='due_date' />
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

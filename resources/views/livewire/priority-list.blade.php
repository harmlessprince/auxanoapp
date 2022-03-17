@extends('layouts.app')
@section('page')
    Priorities
@endsection

@section('content')
    <div class="flex justify-between mb-4 items-center">
        <h4 class="text-lg font-semibold text-gray-600 dark:text-gray-300">
            All Priorities
        </h4>
        <div x-data="{ show: @entagle('viewModal').defer }">
            <div class="flex justify-center">
                <button @click={show=true} type="button"
                    class="leading-tight bg-blue-600 text-gray-200 rounded px-6 py-3 text-sm focus:outline-none focus:border-white">
                    Add Priority</Button>
            </div>
            <div x-show="show" tabindex="0" class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed">
                <div @click.away="show = false" class="z-50 relative p-3 mx-auto my-0 max-w-full" style="width: 600px;">
                    <div class="bg-white rounded shadow-lg border flex flex-col overflow-hidden">
                        <button @click={show=false}
                            class="fill-current h-6 w-6 absolute right-0 top-0 m-6 font-3xl font-bold">&times;</button>
                        <div class="px-6 py-3 text-xl border-b font-bold">Title of the modal</div>
                        <div class="p-6 flex-grow">
                          {{$priority ?? ''}}
                        </div>
                        <div class="px-6 py-3 border-t">
                            <div class="flex justify-end">
                                <button @click={show=false} type="button"
                                    class="bg-gray-700 text-gray-100 rounded px-4 py-2 mr-1">Close</Button>
                                <button type="button" class="bg-blue-600 text-gray-200 rounded px-4 py-2">Saves
                                    Changes</Button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed bg-black opacity-50"></div>
            </div>
        </div>
    </div>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Created At</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($priorities as $item)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 capitalize">
                                {{ $item->name }}
                            </td>
                            <td>
                                {{ $item->created_at->format('Y-m-d') }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <button type="button"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="kkdk" wire:click.prevent="edit({{ $item }})">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- {{ $categories->links() }} --}}
    </div>
@endsection

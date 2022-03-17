@extends('layouts.app')
@section('page')
    Roles
@endsection

@section('content')
    <!-- With actions -->
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        All roles
    </h4>
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
                    @foreach ($roles as $role)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 capitalize">
                                {{ $role->name }}
                            </td>
                            <td>
                                {{ $role->created_at->format('Y-m-d') }}
                            </td>
                            <td class="px-4 py-3">
                                N/A
                            </td>
                        </tr>
                    @endforeach


                </tbody>


            </table>
        </div>
        {{ $roles->links() }}
    </div>
@endsection

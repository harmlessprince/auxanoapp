@extends('layouts.app')
@section('page')
    Users
@endsection

@section('content')
    <!-- With actions -->
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        All users
    </h4>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        {{-- {{ Session::get('success', 'ndd')}} --}}
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">First Name</th>
                        <th class="px-4 py-3">Last Name</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Email Verified</th>
                        <th class="px-4 py-3">Role</th>
                        <th class="px-4 py-3">Created At</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($users as $user)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 capitalize">
                                {{ $user->first_name }}
                            </td>
                            <td class="px-4 py-3 capitalize">
                                {{ $user->last_name }}
                            </td>
                            <td class="px-4 py-3 lowercase">
                                {{ $user->email }}
                            </td>
                            <td class="px-4 py-3 lowercase">
                                {{ optional($user->email_verified_at)->format('Y-m-d') ?? 'Not verified' }}
                            </td>
                            <td class="px-4 py-3 uppercase">
                                {{ $user->roles->first(null, 'not assigned')->name ?? 'N/A' }}
                            </td>
                            <td>
                                {{ $user->created_at->format('Y-m-d') }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <a class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit" href="{{ route('users.edit', ['user' => $user]) }}">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </a>
                                    <button
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Delete"
                                        onclick="deleteUser(user = {{ json_encode($user->toArray()) }}, url = {{ json_encode(route('users.destroy', ['user' => $user])) }})"
                                        title="Click to delete this user">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach


                </tbody>


            </table>
        </div>
        {{ $users->links() }}
    </div>

    @push('scripts')
        <script type="text/javascript">
            function deleteUser(user, url) {
                const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                swal({
                        title: `Are you sure, you want to delete ${user.first_name} ${user.last_name}?`,
                        text: `${user.first_name}!`,
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
                            // body: JSON.stringify(user)
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
    @endpush
@endsection

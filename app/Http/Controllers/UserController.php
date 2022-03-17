<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\Eloquent\Repository\RoleRepository;
use App\Repositories\Eloquent\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;


class UserController extends Controller
{

    private  $userRepository;
    private $roleRepository;
    public function __construct(UserRepository $userRepository, RoleRepository $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userRepository->paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->roleRepository->all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'min:11'],
            'role' => ['required', 'integer', 'exists:roles,id'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $user = User::create([
            'first_name' => $request->first_name,
            'phone_number' => $request->phone_number,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole([$request->role]);

        event(new Registered($user));
        // Auth::login($user);
        return redirect(route('users.index'))->with('success', 'User created successfully');
        // return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit(User $user)
    {
        $roles = $this->roleRepository->all();
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->userRepository->update($user->id, $request->all());
        $user->syncRoles([$request->role]);
        return redirect(route('users.index'))->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $id
     */
    public function destroy(User $user)
    {
        $success = false;
        $roleName = $user->roles->first(null, 'not assigned')->name ?? null;
        if ($user) {
            if ($roleName == 'super admin') {
                $message = "Sorry, you can't delete a super admin";
            } else {
                $user->delete();
                $success = true;
                $message = "User deleted successfully";
            }
        } else {
            $message = "Unable to delete the selected user";
        }
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
        // return redirect(route('users.index'))->with('info', 'User deleted successfully');
    }
}

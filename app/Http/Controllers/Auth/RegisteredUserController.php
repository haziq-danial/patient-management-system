<?php

namespace App\Http\Controllers\Auth;

use App\Classes\Constants\RoleType;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Medical;
use App\Models\Technician;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'tel_no' => ['required'],
            'address' => ['required'],
        ]);

        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'email' => $request->email,
            'role_type' => $request->role_type,
            'tel_no' => $request->tel_no,
            'address' => $request->address
        ]);

        $user_type = null;
        switch ($request->role_type) {
            case RoleType::MEDICAL:
                $user_type = Medical::create([
                    'user_id' => $user->user_id,
                    'staff_id' => $request->staff_id
                ]);
                $user->assignRole('medical');
                break;
            case RoleType::TECHNICIAN:
                $user_type = Technician::create([
                    'user_id' => $user->user_id,
                    'staff_id' => $request->staff_id
                ]);
                $user->assignRole('technician');
                break;
            case RoleType::ADMIN:
                $user_type = Admin::creat([
                    'user_id' => $user->user_id,
                    'staff_id' => $request->staff_id
                ]);
                $user->assignRole('admin');
                break;

        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}

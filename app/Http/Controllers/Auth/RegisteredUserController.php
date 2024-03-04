<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'cyrillic'],
            'login' => ['required', 'string', 'min:4', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'phone_number' => ['required', 'numeric', 'digits:10'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $name_parts = Str::of($request->name)->squish()->explode(' ');
        if (count($name_parts) != 3)
            return back()->withErrors([
                'name' => __('Поле ФИО должно содержать 3 слова.')
            ]);

        $user = User::create([
            'first_name' => $name_parts[1],
            'middle_name' => $name_parts[2],
            'last_name' => $name_parts[0],
            'login' => $request->login,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}

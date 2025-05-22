<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Пожалуйста, введите email',
            'email.email' => 'Пожалуйста, введите корректный email',
            'password.required' => 'Пожалуйста, введите пароль'
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return response()->json(['success' => true]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Неверный email или пароль'
        ], 422);
    }

    public function register(Request $request) {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ], [
            'name.required' => 'Пожалуйста, введите имя',
            'name.max' => 'Имя не должно превышать 255 символов',
            'email.required' => 'Пожалуйста, введите email',
            'email.email' => 'Пожалуйста, введите корректный email',
            'email.unique' => 'Этот email уже зарегистрирован',
            'password.required' => 'Пожалуйста, введите пароль',
            'password.confirmed' => 'Пароли не совпадают'
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Назначаем роль "user" новому пользователю
        $user->assignRole('user');

        Auth::login($user);

        return response()->json(['success' => true]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json(['success' => true, 'redirect' => url('/')]);
    }

    public function profile()
    {
        return view('pages.profile', [
            'user' => Auth::user()
        ]);
    }
}

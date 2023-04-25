<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Login Page
    public function loginPage() {
        return view('pages.auth.login');
    }

    // Register Page
    public function registerPage() {
        return view('pages.auth.register');
    }

    // Login functionality
    public function login(Request $request) {
        $field = $request->validate([
            'username' => 'required|min:4|max:255|exists:users,username',
            'password' => 'required|string|min:8|max:255',
            'rememberMe' => 'nullable|boolean',
        ]);

        auth('user')->attempt($field, $field['rememberMe'] ?? false);

        return redirect(route('home'));
    }

    public function register(Request $request) {
        $field = $request->validate([
            'username' => 'required|min:4|max:255|regex:/^[a-zA-Z0-9_\-]+$/|unique:users,username',
            'email' => 'required|string|max:255|email|unique:users,email',
            'password' => 'required|string|confirmed|min:8|max:255',
        ]);

        $rememberMe = $request->input('rememberMe');

        $user = User::create($field);
        $user->save();
        $result = auth('user')->attempt(['username' => $field["username"], 'password' => $field["password"]], $rememberMe ?? false);

        error_log("Logged in? $result");

        return redirect(route('home'));
    }

    public function logout(Request $request) {
        error_log("Logged out");
        auth('user')->logout();
        error_log("Logged out");

        return redirect(route('home'));
    }
}

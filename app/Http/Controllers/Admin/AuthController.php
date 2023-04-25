<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginPage(Request $request) {
        return view('pages.admin.login');
    }

    // POST - Login
    public function login(Request $request) {
        $field = $request->validate([
            'username' => 'required|max:255|exists:admins,username',
            'password' => 'required|string|min:8|max:255',
        ]);

        error_log("Passed here for some reason with result: ". auth('admin')->attempt($field, true));

        error_log("Passed here for some reason");

        return redirect(route('admin.home'));
    }

    // POST - Logout
    public function logout(Request $request) {
        auth('admin')->logout();

        return redirect(route('admin.login.page'));
    }
}

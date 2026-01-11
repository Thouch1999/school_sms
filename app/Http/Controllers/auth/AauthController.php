<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AauthController extends Controller
{
    public function login(Request $request)
    {
        // Handle language switching
        if ($request->has('lang')) {
            $lang = $request->get('lang');
            if (in_array($lang, ['en', 'kh'])) {
                app()->setLocale($lang);
                session(['locale' => $lang]);
            }
        } elseif (session('locale')) {
            app()->setLocale(session('locale'));
        }
        
        return view('auth.login');
    }
    
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // Fake authentication data
        $fakeUsers = [
            [
                'email' => 'admin@school.edu',
                'password' => 'admin123',
                'name' => 'Master Admin',
                'role' => 'master_admin',
            ],
            [
                'email' => 'teacher@school.edu',
                'password' => 'teacher123',
                'name' => 'John Teacher',
                'role' => 'teacher',
            ],
        ];

        $email = $request->email;
        $password = $request->password;

        // Check credentials
        foreach ($fakeUsers as $user) {
            if ($user['email'] === $email && $user['password'] === $password) {
                // Store user data in session
                session([
                    'user' => [
                        'name' => $user['name'],
                        'email' => $user['email'],
                        'role' => $user['role'],
                    ],
                    'authenticated' => true,
                ]);

                // Remember me functionality
                if ($request->has('remember')) {
                    cookie('remember_user', $email, 60 * 24 * 30); // 30 days
                }

                return redirect()->route('dashboard')->with('success', 'Welcome back, ' . $user['name'] . '!');
            }
        }

        // Authentication failed
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email'));
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login')->with('success', 'You have been logged out successfully.');
    }
    
}

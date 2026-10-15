<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => ['required_without:identifier', 'email', 'nullable'],
            'identifier' => ['required_without:email', 'string', 'nullable'],
            'password' => ['required', 'string'],
        ]);

        $loginField = filled($validated['email'] ?? null) ? 'email' : 'identifier';
        $email = $validated['email'] ?? null;

        if ($loginField === 'identifier') {
            $user = User::query()
                ->where('email', $validated['identifier'])
                ->orWhere('affiliate', $validated['identifier'])
                ->first();

            $email = $user?->email;
        }

        $credentials = [
            'email' => $email,
            'password' => $validated['password'],
        ];

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()->withErrors([
                $loginField => 'Las credenciales no coinciden con nuestros registros.',
            ])->onlyInput($loginField);
        }

        $request->session()->regenerate();

        return redirect()->intended(route('profile'))->with('status', 'Has iniciado sesión correctamente.');
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('status', 'Has cerrado sesión correctamente.');
    }
}
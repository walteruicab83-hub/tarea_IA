<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function show(Request $request): View
    {
        return view('profile', [
            'profile' => $this->profileData($request),
        ]);
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'phone' => ['nullable', 'string', 'max:30'],
            'city' => ['nullable', 'string', 'max:120'],
            'date_of_birth' => ['nullable', 'date', 'before_or_equal:today'],
            'blood_type' => ['nullable', 'string', 'max:10'],
            'insurance' => ['nullable', 'string', 'max:150'],
            'affiliate' => ['nullable', 'string', 'max:50'],
            'medical_notes' => ['nullable', 'string', 'max:5000'],
            'preferences' => ['nullable', 'array'],
            'preferences.*' => ['string', 'max:100'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        $validated['preferences'] ??= [];

        if (blank($validated['password'] ?? null)) {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('profile.edit')->with('status', 'Tu perfil se actualizó correctamente.');
    }

    /**
     * Build the current profile view's existing data shape from the authenticated user.
     *
     * @return array<string, mixed>
     */
    private function profileData(Request $request): array
    {
        $user = $request->user();

        return [
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone ?? 'No indicado',
            'city' => $user->city ?? 'No indicada',
            'dob' => $user->date_of_birth?->format('d/m/Y') ?? 'No indicada',
            'bloodType' => $user->blood_type ?? 'No indicado',
            'insurance' => $user->insurance ?? 'No indicado',
            'affiliate' => $user->affiliate ?? 'No indicado',
            'medicalNotes' => $user->medical_notes ?? 'Sin observaciones registradas.',
            'preferences' => $user->preferences ?? [],
        ];
    }
}

@extends('layouts.app')

@section('title', 'Editar perfil - DentiSync')

@section('content')
<div class="min-h-screen bg-slate-100 text-slate-900">
    <header class="border-b border-slate-200 bg-white/90 backdrop-blur-sm">
        <div class="mx-auto flex max-w-6xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
            <a href="{{ route('profile') }}" class="flex items-center gap-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-gradient-to-br from-teal-600 to-cyan-500 text-white shadow-lg shadow-teal-600/20">
                    <span class="material-symbols-outlined text-[26px]">dentistry</span>
                </div>
                <div>
                    <p class="text-lg font-black tracking-tight text-slate-900">DentiSync</p>
                    <p class="text-[10px] font-semibold uppercase tracking-[0.22em] text-slate-500">Clinica Digital</p>
                </div>
            </a>
            <a href="{{ route('profile') }}" class="text-sm font-semibold text-teal-700 hover:text-teal-800">Volver al perfil</a>
        </div>
    </header>

    <main class="mx-auto max-w-3xl px-4 py-8 sm:px-6 lg:px-8">
        <div class="mb-6">
            <p class="text-sm font-semibold uppercase tracking-[0.22em] text-teal-700">Cuenta</p>
            <h1 class="mt-2 text-3xl font-black tracking-tight text-slate-900">Editar perfil</h1>
        </div>

        @if (session('status'))
            <div role="status" class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">{{ session('status') }}</div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <section class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="mb-5 text-xl font-bold text-slate-900">Datos personales</h2>
                <div class="grid gap-4 md:grid-cols-2">
                    @foreach ([
                        'name' => ['Nombre completo', 'text'],
                        'email' => ['Correo electrónico', 'email'],
                        'phone' => ['Teléfono', 'tel'],
                        'city' => ['Ciudad', 'text'],
                        'date_of_birth' => ['Fecha de nacimiento', 'date'],
                        'blood_type' => ['Grupo sanguíneo', 'text'],
                        'insurance' => ['Seguro', 'text'],
                        'affiliate' => ['Afiliado', 'text'],
                    ] as $field => [$label, $type])
                        <div>
                            <label for="{{ $field }}" class="mb-1.5 block text-xs font-bold uppercase tracking-wider text-slate-700">{{ $label }}</label>
                            <input
                                id="{{ $field }}"
                                name="{{ $field }}"
                                type="{{ $type }}"
                                value="{{ old($field, $field === 'date_of_birth' ? $user->date_of_birth?->format('Y-m-d') : $user->{$field}) }}"
                                @if ($field === 'name' || $field === 'email') required @endif
                                @if ($field === 'email') autocomplete="email" @endif
                                @if ($field === 'phone') autocomplete="tel" @endif
                                class="h-12 w-full rounded-xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-800 placeholder:text-slate-400 transition-all focus:border-teal-600 focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-600/20 @error($field) border-red-500 @enderror"
                            />
                            @error($field)
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    @endforeach

                    <div class="md:col-span-2">
                        <label for="medical_notes" class="mb-1.5 block text-xs font-bold uppercase tracking-wider text-slate-700">Notas médicas</label>
                        <textarea id="medical_notes" name="medical_notes" rows="4" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 transition-all focus:border-teal-600 focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-600/20 @error('medical_notes') border-red-500 @enderror">{{ old('medical_notes', $user->medical_notes) }}</textarea>
                        @error('medical_notes')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </section>

            <section class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="mb-5 text-xl font-bold text-slate-900">Preferencias de notificación</h2>
                <div class="space-y-3">
                    @foreach (['Recordatorio por SMS', 'Confirmación por WhatsApp', 'Idioma: Español'] as $preference)
                        <label class="flex items-center gap-3 rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">
                            <input type="checkbox" name="preferences[]" value="{{ $preference }}" @checked(in_array($preference, is_array(old('preferences', $user->preferences ?? [])) ? old('preferences', $user->preferences ?? []) : [], true)) class="h-4 w-4 rounded border-slate-300 text-teal-600 focus:ring-teal-500/25">
                            <span class="text-sm font-medium text-slate-700">{{ $preference }}</span>
                        </label>
                    @endforeach
                </div>
                @error('preferences')
                    <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </section>

            <section class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="mb-1 text-xl font-bold text-slate-900">Cambiar contraseña</h2>
                <p class="mb-5 text-sm text-slate-500">Déjala vacía si no deseas cambiarla.</p>
                <div class="grid gap-4 md:grid-cols-2">
                    <div>
                        <label for="password" class="mb-1.5 block text-xs font-bold uppercase tracking-wider text-slate-700">Nueva contraseña</label>
                        <input id="password" name="password" type="password" autocomplete="new-password" class="h-12 w-full rounded-xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-800 transition-all focus:border-teal-600 focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-600/20 @error('password') border-red-500 @enderror">
                        @error('password')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="password_confirmation" class="mb-1.5 block text-xs font-bold uppercase tracking-wider text-slate-700">Confirmar contraseña</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" class="h-12 w-full rounded-xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-800 transition-all focus:border-teal-600 focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-600/20">
                    </div>
                </div>
            </section>

            <div class="flex justify-end">
                <button type="submit" class="rounded-full bg-teal-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-teal-600/20 transition hover:bg-teal-700">Guardar cambios</button>
            </div>
        </form>

        <form action="{{ route('logout') }}" method="POST" class="mt-6 text-right">
            @csrf
            <button type="submit" class="text-sm font-semibold text-slate-600 hover:text-slate-900">Cerrar sesión</button>
        </form>
    </main>
</div>
@endsection

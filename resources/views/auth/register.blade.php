@extends('layouts.app')

@section('title', 'Crear cuenta - DentiSync')

@section('content')
<header class="mx-auto flex w-full max-w-md items-center justify-between px-5 pt-4">
    <a href="{{ route('login') }}" aria-label="Volver" class="tap-scale flex h-10 w-10 items-center justify-center rounded-full border border-slate-200/70 bg-slate-50 text-slate-600 hover:bg-slate-100">
        <span class="material-symbols-outlined text-[20px]">arrow_back</span>
    </a>
    <div class="inline-flex items-center gap-1.5 rounded-full border border-teal-200/60 bg-teal-50 px-3 py-1">
        <span class="h-2 w-2 rounded-full bg-teal-600"></span>
        <span class="text-[11px] font-bold uppercase tracking-wide text-teal-700">Portal Pacientes</span>
    </div>
    <a href="mailto:soporte@dentisync.com" aria-label="Ayuda" class="tap-scale flex h-10 w-10 items-center justify-center rounded-full border border-slate-200/70 bg-slate-50 text-slate-600 hover:bg-slate-100">
        <span class="material-symbols-outlined text-[20px]">help_outline</span>
    </a>
</header>

<main class="mx-auto flex w-full max-w-md flex-1 flex-col justify-center px-6 py-6">
    <div class="mb-7 text-center">
        <div class="mb-4 inline-flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-tr from-teal-700 to-teal-500 text-white shadow-lg shadow-teal-600/20 ring-4 ring-teal-100">
            <span class="material-symbols-outlined text-[32px]">person_add</span>
        </div>
        <div class="flex items-center justify-center gap-2">
            <h1 class="font-display text-2xl font-extrabold tracking-tight text-slate-900">Crear cuenta</h1>
            <span class="rounded bg-teal-100 px-2 py-0.5 text-[10px] font-bold uppercase tracking-wider text-teal-800">DentiSync</span>
        </div>
        <p class="mx-auto mt-1 max-w-xs font-body text-sm text-slate-500">
            Regístrate para acceder a tu historial clínico y gestionar tus citas.
        </p>
    </div>

    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm shadow-slate-100">
        @if (session('status'))
            <div role="status" class="mb-4 rounded-xl bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">{{ session('status') }}</div>
        @endif
        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf
            <x-form-input
                id="name"
                name="name"
                label="Nombre completo"
                placeholder="Tu nombre completo"
                icon="person"
                autocomplete="name"
            />

            <x-form-input
                id="email"
                name="email"
                label="Correo electrónico"
                type="email"
                placeholder="ejemplo@paciente.com"
                icon="mail"
                autocomplete="email"
            />

            <x-form-input
                id="phone"
                name="phone"
                label="Teléfono (opcional)"
                placeholder="+34 612 345 678"
                icon="call"
                autocomplete="tel"
                :required="false"
            />

            <div>
                <label for="city" class="mb-1.5 block text-xs font-bold uppercase tracking-wider text-slate-700">Ciudad (opcional)</label>
                <input id="city" name="city" type="text" value="{{ old('city') }}" autocomplete="address-level2" class="h-12 w-full rounded-xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-800 placeholder:text-slate-400 transition-all focus:border-teal-600 focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-600/20 @error('city') border-red-500 @enderror" />
                @error('city')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="date_of_birth" class="mb-1.5 block text-xs font-bold uppercase tracking-wider text-slate-700">Fecha de nacimiento (opcional)</label>
                <input id="date_of_birth" name="date_of_birth" type="date" value="{{ old('date_of_birth') }}" autocomplete="bday" class="h-12 w-full rounded-xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-800 transition-all focus:border-teal-600 focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-600/20 @error('date_of_birth') border-red-500 @enderror" />
                @error('date_of_birth')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="mb-1.5 block text-xs font-bold uppercase tracking-wider text-slate-700">Contraseña</label>
                <input id="password" name="password" type="password" autocomplete="new-password" required class="h-12 w-full rounded-xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-800 placeholder:text-slate-400 transition-all focus:border-teal-600 focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-600/20 @error('password') border-red-500 @enderror" />
                @error('password')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="mb-1.5 block text-xs font-bold uppercase tracking-wider text-slate-700">Confirmar contraseña</label>
                <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required class="h-12 w-full rounded-xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-800 placeholder:text-slate-400 transition-all focus:border-teal-600 focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-600/20" />
            </div>

            <button type="submit" class="tap-scale mt-2 flex h-12 w-full items-center justify-center gap-2 rounded-xl bg-teal-600 text-sm font-semibold text-white shadow-sm shadow-teal-600/30 transition-all hover:bg-teal-700 active:bg-teal-800">
                <span>Crear cuenta</span>
                <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
            </button>
        </form>
    </div>

    <div class="mt-5 text-center">
        <p class="font-body text-xs text-slate-500">¿Ya tienes cuenta? <a href="{{ route('login') }}" class="font-bold text-teal-700 hover:underline">Inicia sesión</a></p>
    </div>
</main>
@endsection

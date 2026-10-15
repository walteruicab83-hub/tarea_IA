@extends('layouts.app')

@section('title', 'Iniciar Sesión - DentiSync')

@section('content')
<header class="mx-auto flex w-full max-w-md items-center justify-between px-5 pt-4">
    <a href="{{ route('home') }}" aria-label="Volver" class="tap-scale flex h-10 w-10 items-center justify-center rounded-full border border-slate-200/70 bg-slate-50 text-slate-600 hover:bg-slate-100">
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
            <svg class="h-8 w-8 fill-current" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M12 2C8.5 2 6.5 4 6.5 7C6.5 8.6 7 10 7.5 11.5C8 13 8 14.5 7.5 17C7 19.5 8 22 10 22C11.5 22 11.8 20 12 18.5C12.2 20 12.5 22 14 22C16 22 17 19.5 16.5 17C16 14.5 16 13 16.5 11.5C17 10 17.5 8.6 17.5 7C17.5 4 15.5 2 12 2ZM12 4C14.5 4 15.5 5.5 15.5 7C15.5 8.2 15.1 9.3 14.6 10.8C14.1 12.3 14 14.2 14.5 16.7C14.7 17.8 14.5 19 14 19.8C13.6 19.1 13.5 17.8 13.5 17C13.5 16.2 12.8 15.5 12 15.5C11.2 15.5 10.5 16.2 10.5 17C10.5 17.8 10.4 19.1 10 19.8C9.5 19 9.3 17.8 9.5 16.7C10 14.2 9.9 12.3 9.4 10.8C8.9 9.3 8.5 8.2 8.5 7C8.5 5.5 9.5 4 12 4Z"/>
            </svg>
        </div>
        <div class="flex items-center justify-center gap-2">
            <h1 class="font-display text-2xl font-extrabold tracking-tight text-slate-900">DentiSync</h1>
            <span class="rounded bg-teal-100 px-2 py-0.5 text-[10px] font-bold uppercase tracking-wider text-teal-800">Clinic</span>
        </div>
        <p class="mx-auto mt-1 max-w-xs font-body text-sm text-slate-500">
            Accede a tu historial clínico, agenda tus citas dentales y revisa tu odontograma.
        </p>
    </div>

    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm shadow-slate-100">
        @if (session('status'))
            <div role="status" class="mb-4 rounded-xl bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">{{ session('status') }}</div>
        @endif
        <form id="loginForm" action="{{ route('login') }}" method="POST" class="space-y-4">
            @csrf
            <x-form-input
                id="email"
                name="email"
                label="Correo electrónico"
                type="email"
                placeholder="ejemplo@paciente.com"
                icon="badge"
                autocomplete="email"
            />

            <div>
                <div class="mb-1.5 flex items-center justify-between">
                    <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-700">Contraseña</label>
                    <a href="mailto:soporte@dentisync.com?subject=Recuperar%20contrase%C3%B1a" class="text-xs font-semibold text-teal-700 hover:text-teal-800 hover:underline">
                        ¿Olvidaste tu contraseña?
                    </a>
                </div>
                <x-form-input
                    id="password"
                    name="password"
                    label=""
                    type="password"
                    placeholder="Introduce tu contraseña"
                    icon="lock"
                    autocomplete="current-password"
                />
            </div>

            <label class="flex cursor-pointer select-none items-center gap-2 pt-0.5">
                <input type="hidden" name="remember" value="0" />
                <input type="checkbox" name="remember" value="1" @checked(old('remember', '1') === '1') class="h-4 w-4 rounded border-slate-300 text-teal-600 focus:ring-teal-500/25" />
                <span class="font-body text-xs text-slate-600">Recordar en este dispositivo</span>
            </label>

            <button id="submitBtn" type="submit" class="tap-scale mt-2 flex h-12 w-full items-center justify-center gap-2 rounded-xl bg-teal-600 text-sm font-semibold text-white shadow-sm shadow-teal-600/30 transition-all hover:bg-teal-700 active:bg-teal-800">
                <span>Iniciar Sesión</span>
                <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
            </button>
        </form>

        <button type="button" class="tap-scale mt-3 flex h-11 w-full items-center justify-center gap-2 rounded-xl border border-teal-200/70 bg-teal-50/70 text-xs font-bold text-teal-800 transition-all hover:bg-teal-100/60">
            <span class="material-symbols-outlined text-[20px] text-teal-600">fingerprint</span>
            <span>Acceder con Huella o Face ID</span>
        </button>

        <div class="relative my-5 flex items-center justify-center">
            <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-slate-200"></div></div>
            <span class="relative bg-white px-3 text-[11px] font-semibold uppercase tracking-wider text-slate-400">o continúa con</span>
        </div>

        <div class="grid grid-cols-2 gap-3">
            <button type="button" class="tap-scale flex h-11 items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-3 text-xs font-semibold text-slate-700 transition-all hover:bg-slate-50">
                <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" aria-hidden="true">
                    <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/><path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/><path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
                </svg>
                <span>Google</span>
            </button>
            <button type="button" class="tap-scale flex h-11 items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-3 text-xs font-semibold text-slate-700 transition-all hover:bg-slate-50">
                <svg class="h-4 w-4 shrink-0 fill-current text-slate-800" viewBox="0 0 170 170" aria-hidden="true"><path d="M150.37 130.25c-2.45 5.66-5.35 10.87-8.71 15.66-4.58 6.53-8.33 11.05-11.22 13.56-4.48 4.12-9.28 6.23-14.42 6.35-3.69 0-8.14-1.05-13.32-3.18-5.19-2.12-9.97-3.17-14.34-3.17-4.58 0-9.49 1.05-14.75 3.17-5.26 2.13-9.5 3.24-12.74 3.35-4.35.13-9.16-1.9-14.42-6.08-3.69-3.04-7.69-7.85-12-14.44-6.1-9.33-10.88-19.82-14.35-31.49-3.48-11.66-5.22-22.84-5.22-33.54 0-14.34 3.73-26.06 11.19-35.16 7.46-9.11 16.66-13.78 27.61-14.02 5.02 0 10.63 1.34 16.83 4.04 6.2 2.69 10.02 4.09 11.47 4.19 1.11-.1 5.09-1.55 11.94-4.35 6.84-2.81 12.56-4.04 17.15-3.69 12.63 1.01 22.45 5.92 29.46 14.74-11.08 6.72-16.51 15.9-16.3 27.56.22 9.15 3.79 16.91 10.72 23.27 6.93 6.36 15.11 10.01 24.53 10.95-2.01 6.13-4.57 12.01-7.68 17.62zM119.22 31.84c0-7.25 2.65-14.18 7.95-20.78 5.3-6.6 11.89-10.66 19.78-12.18.22 1.12.33 2.12.33 3.02 0 7.15-2.73 14.06-8.2 20.73-5.46 6.67-12.07 10.5-19.86 11.49-.01-.76-.0-.1.28-.28z"/></svg>
                <span>Apple ID</span>
            </button>
        </div>
    </div>

    <div class="mt-5 text-center">
        <p class="font-body text-xs text-slate-500">¿Aún no tienes cuenta? <a href="{{ route('register') }}" class="font-bold text-teal-700 hover:underline">Regístrate aquí</a></p>
    </div>

    <div class="mt-6 flex items-start gap-3 rounded-xl border border-slate-200/80 bg-slate-50 p-3.5">
        <div class="mt-0.5 flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-teal-100/70 text-teal-700">
            <span class="material-symbols-outlined text-[17px]">verified_user</span>
        </div>
        <div class="font-body text-[11px] leading-relaxed text-slate-600">
            <strong class="font-semibold text-slate-800">Seguridad clínica 256-bit:</strong> Datos médicos y odontogramas cifrados bajo normativas RGPD y estándares HIPAA.
        </div>
    </div>
</main>

<footer class="mx-auto w-full max-w-md border-t border-slate-100 px-6 py-3 text-center">
    <div class="flex items-center justify-center gap-4 text-[11px] font-medium text-slate-400">
        <a href="{{ route('home') }}" class="hover:text-teal-700">Privacidad</a>
        <span aria-hidden="true">•</span>
        <a href="{{ route('home') }}" class="hover:text-teal-700">Términos</a>
        <span aria-hidden="true">•</span>
        <a href="mailto:soporte@dentisync.com" class="hover:text-teal-700">Urgencias 24h</a>
    </div>
</footer>

<script>
    const toggleBtn = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');

    toggleBtn?.addEventListener('click', () => {
        const isPassword = passwordInput.type === 'password';
        passwordInput.type = isPassword ? 'text' : 'password';
        eyeIcon.textContent = isPassword ? 'visibility_off' : 'visibility';
    });
</script>
@endsection
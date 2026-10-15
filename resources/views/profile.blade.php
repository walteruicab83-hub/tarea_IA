@extends('layouts.app')

@section('title', 'Perfil del Paciente - DentiSync')

@section('content')
<div class="min-h-screen bg-slate-100 text-slate-900">
    <header class="border-b border-slate-200 bg-white/90 backdrop-blur-sm">
        <div class="mx-auto flex max-w-6xl flex-col gap-4 px-4 py-4 sm:px-6 lg:flex-row lg:items-center lg:justify-between lg:px-8">
            <div class="flex items-center gap-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-gradient-to-br from-teal-600 to-cyan-500 text-white shadow-lg shadow-teal-600/20">
                    <span class="material-symbols-outlined text-[26px]">dentistry</span>
                </div>
                <div>
                    <p class="text-lg font-black tracking-tight text-slate-900">DentiSync</p>
                    <p class="text-[10px] font-semibold uppercase tracking-[0.22em] text-slate-500">Clinica Digital</p>
                </div>
            </div>

            <nav class="flex flex-wrap items-center justify-center gap-2 sm:gap-3">
                <a href="{{ route('dashboard') }}" class="rounded-full bg-teal-50 px-4 py-2 text-sm font-semibold text-teal-800 transition hover:bg-teal-100">Dashboard</a>
                <a href="{{ route('profile') }}" class="rounded-full bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-200">Perfil</a>
            </nav>

            <div class="flex flex-wrap items-center justify-center gap-2 sm:gap-3">
                <a href="{{ route('profile.edit') }}" class="rounded-full bg-teal-600 px-4 py-2 text-center text-sm font-semibold text-white shadow-lg shadow-teal-600/20 transition hover:bg-teal-700">Editar perfil</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="rounded-full bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-700">Cerrar sesión</button>
                </form>
            </div>
        </div>
    </header>

    <main class="mx-auto max-w-6xl px-4 py-8 sm:px-6 lg:px-8">
        @if (session('status'))
            <div role="status" class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">{{ session('status') }}</div>
        @endif
        <section class="mb-8 grid overflow-hidden rounded-[28px] border border-teal-100 bg-white shadow-sm md:grid-cols-[1fr_0.85fr]">
            <div class="flex flex-col justify-center p-6 sm:p-8 lg:p-10">
                <p class="text-sm font-semibold uppercase tracking-[0.22em] text-teal-700">Tu salud, en buenas manos</p>
                <h1 class="mt-2 text-3xl font-black tracking-tight text-slate-900 sm:text-4xl">Hola, {{ $profile['name'] }}</h1>
                <p class="mt-3 max-w-xl text-sm leading-6 text-slate-600 sm:text-base">Consulta tu información y mantén el cuidado de tu sonrisa al día.</p>
                <div class="mt-6 flex flex-wrap gap-3">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center gap-2 rounded-2xl bg-teal-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-teal-600/20 transition hover:bg-teal-700">
                        <span class="material-symbols-outlined text-[19px]">dashboard</span>
                        Ir al dashboard
                    </a>
                    <a href="{{ route('profile.edit') }}" class="inline-flex items-center justify-center gap-2 rounded-2xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">
                        <span class="material-symbols-outlined text-[19px]">edit</span>
                        Actualizar perfil
                    </a>
                </div>
            </div>
            <img src="{{ asset('images/dental-care.svg') }}" alt="Ilustración de cuidado dental en una clínica" class="h-52 w-full object-cover md:h-full md:min-h-64">
        </section>
        <div class="mb-6 flex items-center justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.22em] text-teal-700">Cuenta</p>
                <h2 class="mt-2 text-2xl font-black tracking-tight text-slate-900 sm:text-3xl">Perfil de usuario</h2>
            </div>
            <div class="rounded-full bg-emerald-100 px-3 py-1 text-xs font-bold uppercase tracking-[0.2em] text-emerald-700">Perfil verificado</div>
        </div>

        <div class="grid gap-6 xl:grid-cols-[0.8fr_1.2fr]">
            <aside class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm">
                <div class="flex flex-col items-center text-center">
                    <img src="{{ asset('images/smile-care.svg') }}" alt="Ilustración de una sonrisa saludable" class="mb-2 h-32 w-full rounded-2xl object-cover sm:h-40">
                    <h2 class="mt-5 text-2xl font-bold text-slate-900">{{ $profile['name'] }}</h2>
                    <p class="text-sm text-slate-500">Paciente · {{ $profile['affiliate'] }}</p>
                    <div class="mt-5 flex w-full gap-3">
                        <button type="button" class="flex-1 rounded-2xl bg-slate-100 px-4 py-2.5 text-sm font-semibold text-slate-700">Mensajes</button>
                        <button type="button" class="flex-1 rounded-2xl bg-teal-600 px-4 py-2.5 text-sm font-semibold text-white">Contacto</button>
                    </div>
                </div>

                <div class="mt-6 space-y-4">
                    <div class="rounded-2xl bg-slate-50 p-4">
                        <p class="text-xs uppercase tracking-[0.2em] text-slate-500">Correo</p>
                        <p class="mt-2 text-sm font-semibold text-slate-800">{{ $profile['email'] }}</p>
                    </div>
                    <div class="rounded-2xl bg-slate-50 p-4">
                        <p class="text-xs uppercase tracking-[0.2em] text-slate-500">Teléfono</p>
                        <p class="mt-2 text-sm font-semibold text-slate-800">{{ $profile['phone'] }}</p>
                    </div>
                    <div class="rounded-2xl bg-slate-50 p-4">
                        <p class="text-xs uppercase tracking-[0.2em] text-slate-500">Ciudad</p>
                        <p class="mt-2 text-sm font-semibold text-slate-800">{{ $profile['city'] }}</p>
                    </div>
                </div>
            </aside>

            <section class="space-y-6">
                <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm">
                    <div class="mb-5 flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-[0.22em] text-slate-500">Datos personales</p>
                            <h3 class="mt-1 text-xl font-bold text-slate-900">Información del paciente</h3>
                        </div>
                    </div>

                    <div class="grid gap-4 md:grid-cols-2">
                        <div class="rounded-2xl bg-slate-50 p-4">
                            <p class="text-xs uppercase tracking-[0.2em] text-slate-500">Fecha de nacimiento</p>
                            <p class="mt-2 text-base font-semibold text-slate-900">{{ $profile['dob'] }}</p>
                        </div>
                        <div class="rounded-2xl bg-slate-50 p-4">
                            <p class="text-xs uppercase tracking-[0.2em] text-slate-500">Grupo sanguíneo</p>
                            <p class="mt-2 text-base font-semibold text-slate-900">{{ $profile['bloodType'] }}</p>
                        </div>
                        <div class="rounded-2xl bg-slate-50 p-4">
                            <p class="text-xs uppercase tracking-[0.2em] text-slate-500">Seguro</p>
                            <p class="mt-2 text-base font-semibold text-slate-900">{{ $profile['insurance'] }}</p>
                        </div>
                        <div class="rounded-2xl bg-slate-50 p-4">
                            <p class="text-xs uppercase tracking-[0.2em] text-slate-500">Afiliado</p>
                            <p class="mt-2 text-base font-semibold text-slate-900">{{ $profile['affiliate'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm">
                    <p class="text-sm font-semibold uppercase tracking-[0.22em] text-slate-500">Notas médicas</p>
                    <h3 class="mt-1 text-xl font-bold text-slate-900">Observaciones clínicas</h3>
                    <div class="mt-5 rounded-2xl bg-teal-50 p-4">
                        <p class="text-sm leading-7 text-slate-700">{{ $profile['medicalNotes'] }}</p>
                    </div>
                </div>

                <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm">
                    <p class="text-sm font-semibold uppercase tracking-[0.22em] text-slate-500">Preferencias</p>
                    <h3 class="mt-1 text-xl font-bold text-slate-900">Notificaciones</h3>
                    <div class="mt-5 space-y-3">
                        @foreach ($profile['preferences'] as $pref)
                            <div class="flex items-center justify-between rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">
                                <span class="text-sm font-medium text-slate-700">{{ $pref }}</span>
                                <span class="material-symbols-outlined text-[22px] text-emerald-600">check_circle</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </main>
</div>
@endsection

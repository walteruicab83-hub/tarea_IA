@extends('layouts.app')

@section('title', 'Panel del Paciente - DentiSync')

@section('content')
<div class="min-h-screen bg-slate-100 text-slate-900">
    <header class="border-b border-slate-200 bg-white/90 backdrop-blur-sm">
        <div class="mx-auto flex max-w-7xl flex-col gap-4 px-4 py-4 sm:px-6 lg:flex-row lg:items-center lg:justify-between lg:px-8">
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
                <a href="{{ route('dashboard') }}" class="text-sm font-semibold text-teal-700">Dashboard</a>
                <a href="{{ route('profile') }}" class="rounded-full bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-200">Mi perfil</a>
            </nav>

            <div class="flex items-center gap-3">
                <a href="{{ route('profile.edit') }}" class="rounded-full border border-slate-200 bg-slate-50 px-3 py-2 text-sm font-medium text-slate-700 transition hover:bg-slate-100">Editar perfil</a>
                <a href="{{ route('profile') }}" class="flex items-center gap-3 rounded-full border border-slate-200 bg-slate-50 px-2 py-1.5 transition hover:bg-slate-100">
                    <div class="flex h-9 w-9 items-center justify-center rounded-full bg-gradient-to-br from-amber-200 to-rose-200 text-sm font-bold text-slate-700">LG</div>
                    <div class="hidden text-left sm:block">
                        <p class="text-sm font-semibold text-slate-900">{{ $patient['name'] }}</p>
                        <p class="text-[10px] uppercase tracking-[0.2em] text-slate-500">Paciente</p>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        <div class="mb-8 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.22em] text-teal-700">Bienvenido de nuevo</p>
                <h1 class="mt-2 text-3xl font-black tracking-tight text-slate-900">Panel clínico</h1>
            </div>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('profile') }}" class="inline-flex items-center justify-center gap-2 rounded-2xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">
                    <span class="material-symbols-outlined text-[18px]">person</span>
                    Mi perfil
                </a>
                <a href="{{ route('profile.edit') }}" class="inline-flex items-center justify-center gap-2 rounded-2xl bg-teal-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-teal-600/20 transition hover:bg-teal-700">
                    <span class="material-symbols-outlined text-[18px]">edit</span>
                    Editar perfil
                </a>
            </div>
        </div>

        <section class="mb-6 grid overflow-hidden rounded-[28px] border border-teal-100 bg-white shadow-sm md:grid-cols-[1fr_0.8fr]">
            <div class="flex flex-col justify-center p-6 sm:p-8">
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-teal-700">DentiSync · Clínica digital</p>
                <h2 class="mt-2 text-2xl font-black tracking-tight text-slate-900 sm:text-3xl">Una sonrisa sana empieza con buenos hábitos</h2>
                <p class="mt-3 max-w-xl text-sm leading-6 text-slate-600">Revisa tu progreso y mantente al día con tus cuidados y próximas visitas.</p>
                <a href="{{ route('profile') }}" class="mt-5 inline-flex w-fit items-center gap-2 rounded-xl bg-teal-50 px-4 py-2.5 text-sm font-semibold text-teal-800 transition hover:bg-teal-100">
                    Ver mi perfil <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                </a>
            </div>
            <img src="{{ asset('images/dental-care.svg') }}" alt="Ilustración de atención odontológica" class="h-48 w-full object-cover md:h-full md:min-h-56">
        </section>

        <div class="grid gap-6 xl:grid-cols-[1.5fr_0.9fr]">
            <section class="space-y-6">
                <div class="rounded-[28px] bg-gradient-to-br from-slate-900 via-teal-900 to-teal-700 p-6 text-white shadow-xl shadow-teal-900/20">
                    <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
                        <div class="flex items-center gap-4">
                            <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-white/10 ring-1 ring-white/20">
                                <span class="material-symbols-outlined text-[34px] text-teal-100">person</span>
                            </div>
                            <div>
                                <p class="text-sm uppercase tracking-[0.2em] text-teal-100/80">Paciente</p>
                                <h2 class="mt-1 text-2xl font-bold">{{ $patient['name'] }}</h2>
                                <p class="text-sm text-teal-100/80">ID: {{ $patient['id'] }} · {{ $patient['age'] }} años</p>
                            </div>
                        </div>

                        <div class="rounded-2xl border border-white/15 bg-white/5 px-4 py-3 text-sm text-teal-50">
                            <p class="font-medium text-teal-100/80">Próxima visita</p>
                            <p class="mt-1 text-lg font-bold">{{ $patient['nextAppointment'] }}</p>
                        </div>
                    </div>

                    <div class="mt-8 grid gap-4 sm:grid-cols-3">
                        <div class="rounded-2xl bg-white/5 p-4 ring-1 ring-white/10">
                            <p class="text-xs uppercase tracking-[0.2em] text-teal-100/75">Médico</p>
                            <p class="mt-2 text-lg font-semibold">{{ $patient['doctor'] }}</p>
                        </div>
                        <div class="rounded-2xl bg-white/5 p-4 ring-1 ring-white/10">
                            <p class="text-xs uppercase tracking-[0.2em] text-teal-100/75">Seguro</p>
                            <p class="mt-2 text-lg font-semibold">{{ $patient['insurance'] }}</p>
                        </div>
                        <div class="rounded-2xl bg-white/5 p-4 ring-1 ring-white/10">
                            <p class="text-xs uppercase tracking-[0.2em] text-teal-100/75">Riesgo</p>
                            <p class="mt-2 text-lg font-semibold text-emerald-300">{{ $patient['risk'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm">
                    <div class="mb-5 flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-slate-500">Mi salud bucal</p>
                            <h3 class="mt-1 text-xl font-bold text-slate-900">Tratamiento en curso</h3>
                        </div>
                        <span class="rounded-full bg-emerald-100 px-3 py-1 text-xs font-bold uppercase tracking-[0.2em] text-emerald-700">{{ $patient['completion'] }}%</span>
                    </div>

                    <div class="mb-6 h-3 overflow-hidden rounded-full bg-slate-200">
                        <div class="h-full rounded-full bg-gradient-to-r from-teal-500 to-emerald-500" style="width: {{ $patient['completion'] }}%"></div>
                    </div>

                    <div class="grid gap-4 md:grid-cols-3">
                        <div class="rounded-2xl bg-slate-50 p-4">
                            <p class="text-xs uppercase tracking-[0.2em] text-slate-500">Plan</p>
                            <p class="mt-2 text-lg font-bold text-slate-900">{{ $patient['plan'] }}</p>
                        </div>
                        <div class="rounded-2xl bg-slate-50 p-4">
                            <p class="text-xs uppercase tracking-[0.2em] text-slate-500">Higiene</p>
                            <p class="mt-2 text-lg font-bold text-slate-900">{{ $patient['hygieneScore'] }}/10</p>
                        </div>
                        <div class="rounded-2xl bg-slate-50 p-4">
                            <p class="text-xs uppercase tracking-[0.2em] text-slate-500">Última visita</p>
                            <p class="mt-2 text-lg font-bold text-slate-900">{{ $patient['lastVisit'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm">
                    <div class="mb-5 flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-slate-500">Agenda</p>
                            <h3 class="mt-1 text-xl font-bold text-slate-900">Próximas citas</h3>
                        </div>
                        <a href="#" class="text-sm font-semibold text-teal-700">Ver todo</a>
                    </div>

                    <div class="space-y-3">
                        @foreach ($treatments as $treatment)
                            <div class="flex items-center justify-between rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-white text-teal-700 shadow-sm ring-1 ring-slate-200">
                                        <span class="material-symbols-outlined text-[22px]">calendar_month</span>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-slate-900">{{ $treatment['name'] }}</p>
                                        <p class="text-sm text-slate-500">{{ $treatment['date'] }}</p>
                                    </div>
                                </div>
                                <span class="rounded-full bg-amber-100 px-2.5 py-1 text-[10px] font-bold uppercase tracking-[0.2em] text-amber-700">{{ $treatment['status'] }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <aside class="space-y-6">
                <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm">
                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-slate-500">Odontograma</p>
                    <h3 class="mt-1 text-xl font-bold text-slate-900">Estado dental</h3>

                    <div class="mt-6 grid grid-cols-4 gap-3">
                        @php
                            $teeth = ['18','17','16','15','14','13','12','11','21','22','23','24','25','26','27','28'];
                        @endphp
                        @foreach ($teeth as $tooth)
                            <div class="flex h-10 items-center justify-center rounded-xl border border-slate-200 bg-slate-50 text-sm font-bold text-slate-700">{{ $tooth }}</div>
                        @endforeach
                    </div>

                    <div class="mt-6 rounded-2xl bg-teal-50 p-4">
                        <p class="text-xs uppercase tracking-[0.2em] text-teal-700">Seguimiento</p>
                        <p class="mt-2 text-sm text-slate-700">Se observa una leve mejora en la alineación superior y un ajuste de retenedor recomendado en la próxima revisión.</p>
                    </div>
                </div>

                <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm">
                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-slate-500">Recordatorio</p>
                    <h3 class="mt-1 text-xl font-bold text-slate-900">Hoy</h3>

                    <div class="mt-5 space-y-4">
                        <div class="rounded-2xl bg-sky-50 p-4">
                            <p class="text-xs uppercase tracking-[0.2em] text-sky-700">Higiene</p>
                            <p class="mt-2 text-sm font-semibold text-slate-900">Cepillado 2 minutos antes de dormir</p>
                        </div>
                        <div class="rounded-2xl bg-rose-50 p-4">
                            <p class="text-xs uppercase tracking-[0.2em] text-rose-700">Medicamentos</p>
                            <p class="mt-2 text-sm font-semibold text-slate-900">Enjuague bucal tras desayuno</p>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </main>
</div>
@endsection

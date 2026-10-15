@extends('layouts.app')

@section('title', 'Iniciar Sesión - DentiSync')

@section('content')
<header class="w-full pt-safe px-6 py-4 flex items-center justify-between">
    <div class="flex items-center gap-2.5">
        <div class="w-10 h-10 rounded-xl bg-teal-50 border border-teal-100 flex items-center justify-center text-teal-600 shadow-sm">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                <path d="M12 2C8.5 2 6 4.5 6 7.5C6 11 7.5 13 8 16C8.5 19 9.5 22 12 22C14.5 22 15.5 19 16 16C16.5 13 18 11 18 7.5C18 4.5 15.5 2 12 2Z"></path>
                <path d="M9.5 7.5C9.5 6 10.6 5 12 5C13.4 5 14.5 6 14.5 7.5"></path>
            </svg>
        </div>
        <div class="flex flex-col">
            <span class="font-display font-bold text-lg text-slate-900 tracking-tight leading-none flex items-center gap-1">
                Denti<span class="text-teal-600">Sync</span>
            </span>
            <span class="text-[11px] font-medium text-slate-600 uppercase tracking-wider mt-0.5">Clínica Digital</span>
        </div>
    </div>
    <a class="inline-flex items-center gap-1 text-xs font-semibold text-slate-700 hover:text-teal-600 py-1.5 px-3 rounded-full hover:bg-slate-50 transition-colors" href="#">
        <span class="material-symbols-outlined text-[16px]">support_agent</span>
        <span>Ayuda</span>
    </a>
</header>

<main class="w-full max-w-md mx-auto px-6 py-6 flex-1 flex flex-col justify-center">
    <div class="mb-8 text-center sm:text-left">
        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-teal-50 border border-teal-100 text-teal-700 text-xs font-semibold mb-3">
            <span class="w-2 h-2 rounded-full bg-teal-500 animate-pulse"></span>
            Portal del Paciente
        </div>
        <h1 class="font-display font-bold text-2xl sm:text-3xl text-slate-900 tracking-tight">Iniciar Sesión</h1>
        <p class="text-sm text-slate-700 mt-1.5 leading-relaxed">Accede a tu historial clínico, citas y seguimiento de tratamientos bucodentales.</p>
    </div>
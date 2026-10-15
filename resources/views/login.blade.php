@extends('layouts.app')

@section('title', 'Iniciar Sesión - DentiSync')

@section('content')

<!-- Minimal Top Bar / Header -->
<header class="w-full pt-safe px-6 py-4 flex items-center justify-between">
<div class="flex items-center gap-2.5">
<!-- DentiSync Medical Tooth Logo Icon -->
<div class="w-10 h-10 rounded-xl bg-teal-50 border border-teal-100 flex items-center justify-center text-teal-600 shadow-sm">
<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24">
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
<!-- Language / Help Quick Link -->
<a class="inline-flex items-center gap-1 text-xs font-semibold text-slate-700 hover:text-teal-600 py-1.5 px-3 rounded-full hover:bg-slate-50 transition-colors" href="#">
<span class="material-symbols-outlined text-[16px]">support_agent</span>
<span>Ayuda</span>
</a>
</header>
<!-- Main Content Form Section -->
<main class="w-full max-w-md mx-auto px-6 py-6 flex-1 flex flex-col justify-center">
@if (session('status'))
<div role="status" class="mb-4 rounded-xl bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">{{ session('status') }}</div>
@endif
<!-- Welcome Heading -->
<div class="mb-8 text-center sm:text-left">
<div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-teal-50 border border-teal-100 text-teal-700 text-xs font-semibold mb-3">
<span class="w-2 h-2 rounded-full bg-teal-500 animate-pulse"></span>
        Portal del Paciente
      </div>
<h1 class="font-display font-bold text-2xl sm:text-3xl text-slate-900 tracking-tight">Iniciar Sesión</h1>
<p class="text-sm text-slate-700 mt-1.5 leading-relaxed">Accede a tu historial clínico, citas y seguimiento de tratamientos bucodentales.</p>
</div>
<!-- Login Form -->
<form class="space-y-4" id="loginForm" action="{{ route('login') }}" method="POST">
@csrf
<!-- Input: Email / Patient ID -->
<div class="space-y-1.5">
<label class="block text-xs font-semibold uppercase tracking-wider text-slate-700" for="identifier">
          Correo electrónico o ID Paciente
        </label>
<div class="relative flex items-center">
<span class="material-symbols-outlined absolute left-3.5 text-slate-600 text-[20px] pointer-events-none">
            mail
          </span>
<input class="w-full h-12 bg-white text-slate-900 placeholder:text-slate-600 text-sm font-medium rounded-xl pl-11 pr-4 border border-slate-200 focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 outline-none transition-all duration-200 shadow-sm" id="identifier" name="identifier" value="{{ old('identifier') }}" placeholder="ej. laura.gomez@email.com" required="" type="text"/>
@error('identifier')
<p class="text-xs text-red-600">{{ $message }}</p>
@enderror
</div>
</div>
<!-- Input: Password -->
<div class="space-y-1.5">
<div class="flex items-center justify-between">
<label class="block text-xs font-semibold uppercase tracking-wider text-slate-700" for="password">
            Contraseña
          </label>
<a class="text-xs font-semibold text-teal-600 hover:text-teal-700 hover:underline" href="#">
            ¿Olvidaste tu contraseña?
          </a>
</div>
<div class="relative flex items-center">
<span class="material-symbols-outlined absolute left-3.5 text-slate-600 text-[20px] pointer-events-none">
            lock
          </span>
<input class="w-full h-12 bg-white text-slate-900 placeholder:text-slate-600 text-sm font-medium rounded-xl pl-11 pr-11 border border-slate-200 focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 outline-none transition-all duration-200 shadow-sm" id="password" name="password" placeholder="••••••••" required="" type="password"/>
<button aria-label="Mostrar u ocultar contraseña" class="absolute right-3 text-slate-600 hover:text-slate-700 p-1 rounded-lg focus:outline-none" id="togglePassword" onclick="togglePasswordVisibility()" type="button">
<span class="material-symbols-outlined text-[20px]" id="eyeIcon">visibility</span>
</button>
</div>
@error('password')
<p class="text-xs text-red-600">{{ $message }}</p>
@enderror
</div>
<!-- Remember Me Checkbox -->
<div class="flex items-center justify-between pt-1">
<label class="flex items-center gap-2 cursor-pointer select-none">
<input checked="" class="w-4 h-4 rounded border-slate-300 text-teal-600 focus:ring-teal-500 transition-colors" id="remember" name="remember" value="1" type="checkbox"/>
<span class="text-xs font-medium text-slate-700">Recordar mi sesión</span>
</label>
</div>
<!-- Primary Sign In Button -->
<div class="pt-2">
<button class="w-full h-12 bg-teal-600 hover:bg-teal-700 active:scale-[0.99] text-white font-display font-semibold text-sm rounded-xl shadow-md shadow-teal-600/20 flex items-center justify-center gap-2 transition-all duration-150" id="btnLogin" type="submit">
<span>Iniciar Sesión</span>
<span class="material-symbols-outlined text-[18px]">arrow_forward</span>
</button>
</div>
<!-- Biometric Quick Auth Button -->
<button class="w-full h-11 bg-teal-50/70 hover:bg-teal-50 active:scale-[0.99] text-teal-700 border border-teal-100 font-semibold text-xs rounded-xl flex items-center justify-center gap-2 transition-all duration-150" onclick="simulateBiometric()" type="button">
<span class="material-symbols-outlined text-[19px] text-teal-600">fingerprint</span>
<span>Acceder con Huella o Face ID</span>
</button>
<!-- Social / Alternative Separator -->
<div class="relative flex items-center justify-center py-2">
<div class="border-t border-slate-200 w-full"></div>
<span class="bg-white px-3 text-[11px] uppercase tracking-wider text-slate-600 font-semibold absolute">O continúa con</span>
</div>
<!-- Social Buttons -->
<div class="grid grid-cols-2 gap-3">
<!-- Google -->
<button class="h-11 bg-white hover:bg-slate-50 border border-slate-200 rounded-xl flex items-center justify-center gap-2.5 text-xs font-semibold text-slate-700 shadow-2xs active:scale-[0.98] transition-all" onclick="alert('Conexión segura mediante Google Identity')" type="button">
<svg class="w-4 h-4" viewbox="0 0 24 24">
<path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.32v2.76h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"></path>
<path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.76c-.99.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"></path>
<path d="M5.84 14.11c-.22-.66-.35-1.36-.35-2.11s.13-1.45.35-2.11V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.61z" fill="#FBBC05"></path>
<path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z" fill="#EA4335"></path>
</svg>
<span>Google</span>
</button>
<!-- Apple -->
<button class="h-11 bg-white hover:bg-slate-50 border border-slate-200 rounded-xl flex items-center justify-center gap-2.5 text-xs font-semibold text-slate-700 shadow-2xs active:scale-[0.98] transition-all" onclick="alert('Conexión segura mediante Apple ID')" type="button">
<svg class="w-4 h-4 fill-slate-900" viewbox="0 0 24 24">
<path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M15.97 6.42c.67-.82 1.13-1.96.99-3.12-1.01.04-2.17.67-2.84 1.48-.59.7-1.12 1.83-.98 2.96 1.11.08 2.16-.54 2.83-1.32z"></path>
</svg>
<span>Apple</span>
</button>
</div>
</form>
<!-- Sign Up Callout -->
<div class="mt-8 text-center">
<p class="text-xs text-slate-700">
        ¿Aún no tienes cuenta? 
        <a class="font-semibold text-teal-600 hover:text-teal-700 hover:underline ml-1" href="#">
          Regístrate aquí
        </a>
</p>
</div>
</main>
<!-- Security & HIPAA / RGPD Trust Footer -->
<footer class="w-full pb-safe px-6 pt-3 pb-6 text-center">
<div class="inline-flex items-center justify-center gap-1.5 py-2 px-3.5 rounded-full bg-slate-50 border border-slate-100 text-slate-700 max-w-sm mx-auto">
<span class="material-symbols-outlined text-[16px] text-teal-600">verified_user</span>
<span class="text-[11px] leading-tight font-medium">
        Datos cifrados de grado sanitario • RGPD &amp; HIPAA Dental
      </span>
</div>
</footer>
<!-- Simple Interactivity Scripts -->
<script>
    function togglePasswordVisibility() {
      const pwd = document.getElementById('password');
      const icon = document.getElementById('eyeIcon');
      if (pwd.type === 'password') {
        pwd.type = 'text';
        icon.innerText = 'visibility_off';
      } else {
        pwd.type = 'password';
        icon.innerText = 'visibility';
      }
    }

    function simulateBiometric() {
      const btn = event.currentTarget;
      const originalHtml = btn.innerHTML;
      btn.innerHTML = `
        <span class="inline-block animate-spin material-symbols-outlined text-[18px]">progress_activity</span>
        <span>Escaneando datos biométricos...</span>
      `;
      setTimeout(() => {
        btn.innerHTML = originalHtml;
        alert('Identidad biométrica validada con éxito. Redirigiendo a tu panel clínico...');
      }, 1000);
    }

    function submitLogin() {
      const btn = document.getElementById('btnLogin');
      btn.disabled = true;
      btn.innerHTML = `
        <span class="inline-block animate-spin material-symbols-outlined text-[18px]">progress_activity</span>
        <span>Accediendo a DentiSync...</span>
      `;
      setTimeout(() => {
        btn.disabled = false;
        btn.innerHTML = `
          <span>Iniciar Sesión</span>
          <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
        `;
        alert('Bienvenido de nuevo a DentiSync.');
      }, 1200);
    }
  </script>
@endsection

@section('scripts')
<script>
    function togglePasswordVisibility() {
        const pwd = document.getElementById('password');
        const icon = document.getElementById('eyeIcon');
        if (pwd.type === 'password') {
            pwd.type = 'text'; icon.innerText = 'visibility_off';
        } else { pwd.type = 'password'; icon.innerText = 'visibility'; }
    }
    function simulateBiometric() { alert('Biométrico simulado'); }
    function submitLogin() { alert('Login simulado'); }
</script>
@endsection

@props([
    'id',
    'name',
    'label' => null,
    'type' => 'text',
    'placeholder' => '',
    'icon' => null,
    'autocomplete' => null,
    'required' => true,
])

<div>
    @if ($label)
        <label for="{{ $id }}" class="mb-1.5 block text-xs font-bold uppercase tracking-wider text-slate-700">
            {{ $label }}
        </label>
    @endif
    <div class="relative flex items-center">
        @if ($icon)
            <span class="material-symbols-outlined pointer-events-none absolute left-3.5 flex items-center justify-center text-[20px] text-slate-400">
                {{ $icon }}
            </span>
        @endif
        <input
            id="{{ $id }}"
            name="{{ $name }}"
            type="{{ $type }}"
            placeholder="{{ $placeholder }}"
            @if ($type !== 'password') value="{{ old($name) }}" @endif
            @if ($autocomplete) autocomplete="{{ $autocomplete }}" @endif
            @if ($required) required @endif
            @class([
                'h-12 w-full rounded-xl border border-slate-200 bg-slate-50 text-sm text-slate-800 placeholder:text-slate-400 transition-all focus:border-teal-600 focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-600/20',
                'pl-11 pr-4' => $icon,
                'px-4' => ! $icon,
                'pr-11' => $type === 'password',
                'border-red-500' => $errors->has($name),
            ])
        />
        @if ($type === 'password')
            <button
                id="togglePassword"
                type="button"
                aria-label="Ver u ocultar contraseña"
                class="absolute right-3 p-1 text-slate-400 transition-colors hover:text-slate-700 focus:outline-none"
            >
                <span id="eyeIcon" class="material-symbols-outlined text-[20px]">visibility</span>
            </button>
        @endif
    </div>
    @error($name)
        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
    @enderror
</div>
@props([
    'disabled' => false,
    'withicon' => false,
    'placeholder' => 'Pilih opsi...',
    'options' => [],
    'selected' => null,
    'emptyOption' => true,
    'emptyText' => 'Pilih...'
])

@php
    $withiconClasses = $withicon ? 'pl-11 pr-10' : 'px-4 pr-10';
@endphp

<div class="relative">
    @if($withicon)
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            {{ $icon ?? '' }}
        </div>
    @endif
    
    <select
        {{ $disabled ? 'disabled' : '' }}
        {!! $attributes->merge([
                'class' => $withiconClasses . ' py-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring
                focus:ring-orange-500 focus:ring-offset-2 focus:ring-offset-white dark:border-gray-600 dark:bg-dark-eval-1
                dark:text-gray-300 dark:focus:ring-offset-dark-eval-1 appearance-none bg-white dark:bg-dark-eval-1 w-full',
            ])
        !!}
    >
        @if($emptyOption)
            <option value="" disabled {{ !$selected ? 'selected' : '' }}>
                {{ $emptyText }}
            </option>
        @endif
        
        @if(isset($slot) && $slot->isNotEmpty())
            {{ $slot }}
        @else
            @foreach($options as $value => $label)
                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>
                    {{ $label }}
                </option>
            @endforeach
        @endif
    </select>
</div>
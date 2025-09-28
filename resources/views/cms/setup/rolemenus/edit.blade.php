<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Setup Role Menu CMS') }}
        </h2>
    </x-slot>

    <div class="card h-full p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800">
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="/setup/rolemenus/{{ $role->id }}" class="flex flex-col gap-6">
                        @method('PUT')
                        @csrf
                        @foreach ($menus as $menu)
                            <div>
                                {{-- PERUBAHAN DI SINI --}}
                                <input type="checkbox" id="menu_{{ $menu->id }}" name="menus[]" value="{{ $menu->id }}" 
                                       {{ in_array($menu->id, $selectedMenus) ? 'checked' : '' }}
                                       class="rounded text-orange-500 focus:ring-orange-500 menu-parent" data-menu-id="{{ $menu->id }}">
                                <label class="px-3" for="menu_{{ $menu->id }}">{{ $menu->name }}</label>
                                
                                @if ($menu->children->isNotEmpty())
                                    <div class="px-4 py-2">
                                        @foreach ($menu->children as $child)
                                            <div class="py-2">
                                                {{-- DAN PERUBAHAN DI SINI --}}
                                                <input type="checkbox" id="menu_{{ $child->id }}" name="menus[]" value="{{ $child->id }}" 
                                                       {{ in_array($child->id, $selectedMenus) ? 'checked' : '' }}
                                                       class="rounded text-orange-500 focus:ring-orange-500 menu-child menu-child-{{ $menu->id }}">
                                                <label class="px-3" for="menu_{{ $child->id }}">{{ $child->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @endforeach
                         <div class="flex justify-start gap-4">
                            <x-button>
                                {{ __('Update') }}
                            </x-button>
                            <x-button variant="secondary"  href="/setup/rolemenus">
                                {{ __('Cancel') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Script JavaScript tetap sama --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const parentCheckboxes = document.querySelectorAll('.menu-parent');
    
            parentCheckboxes.forEach(parent => {
                parent.addEventListener('click', function() {
                    const menuId = parent.getAttribute('data-menu-id');
                    const childCheckboxes = document.querySelectorAll(`.menu-child-${menuId}`);
                    childCheckboxes.forEach(child => {
                        child.checked = parent.checked;
                    });
                });
            });
        });
    </script>
</x-app-layout>
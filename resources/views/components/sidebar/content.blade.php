<x-perfect-scrollbar
    as="nav"
    aria-label="main"
    class="flex flex-col flex-1 gap-2 px-3"
>

    @if (isset($sidebarMenus) && $sidebarMenus->count() > 0)
        @foreach ($sidebarMenus as $menu)
            @if ($menu->children->count() === 0)
                <x-sidebar.link
                    title="{{ $menu->name }}"
                    href="{{ route($menu->link) }}"
                    :isActive="request()->routeIs($menu->link)"
                >
                    <x-slot name="icon">
                        <i class="{{ $menu->icon }}"></i>
                    </x-slot>
                </x-sidebar.link>
            @else
                <x-sidebar.dropdown
                    title="{{ $menu->name }}"
                    :active="Str::startsWith(request()->route()->uri(), $menu->link)"
                >
                    <x-slot name="icon">
                        <i class="{{ $menu->icon }}"></i>
                    </x-slot>
                @foreach($menu->children as $submenu)
                    <x-sidebar.sublink
                        title="{{ $submenu->name }}"
                        href="{{ route($submenu->link) }}"
                        :active="request()->routeIs($submenu->link)"
                    />
                @endforeach
                </x-sidebar.dropdown>
            @endif
        @endforeach
    @endif
</x-perfect-scrollbar>

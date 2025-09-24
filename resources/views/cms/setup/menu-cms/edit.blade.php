<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Menu CMS') }}
        </h2>
    </x-slot>

    <div class="card h-full p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800">
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="/setup/menu-cms/{{ $menu->id }}" class="flex flex-col gap-6">
                        @method('PUT')
                        @csrf
                        <div>
                            <x-form.label for="main_id" :value="__('Menu Type')" class="mb-2" />
                            <x-form.select 
                                name="main_id" 
                                id="main_id"
                                :value="old('main_id', $menu->main_id)"
                                emptyText="Choose Menu Type"
                                withicon="true"
                                class="border-orange-200 focus:border-orange-500"
                            >
                                <x-slot name="icon">
                                    <i class="ti ti-menu-2 text-orange-400"></i>
                                </x-slot>

                                @php
                                    $currentValue = old('main_id', $menu->main_id);
                                @endphp
                                <option value="0" {{ $currentValue == 0 ? 'selected' : '' }}>
                                    Main Menu
                                </option>
                                <option value="1" {{ $currentValue == 1 ? 'selected' : '' }}>
                                    Submenu
                                </option>

                                @foreach($menu_induk as $mi)
                                    <option value="{{ $mi->id }}" {{ $currentValue == $mi->id ? 'selected' : '' }}>
                                        {{ $mi->name }} [Main Menu]
                                    </option>
                                @endforeach
                            </x-form.select>
                            <x-form.error :messages="$errors->get('main_id')" />
                        </div>
                        <div>
                            <x-form.label
                            for="name"
                            :value="__('Menu Name')"
                            class="mb-2"
                            />
                            <x-form.input
                                id="name"
                                name="name"
                                type="text"
                                class="block w-full"
                                :value="old('name', $menu->name)"
                                required
                                autofocus
                                autocomplete="name"
                            />
                            <x-form.error :messages="$errors->get('name')" />
                        </div>
                        <div>
                            <x-form.label
                                for="description"
                                :value="__('Menu Description')"
                                class="mb-2"
                            />
                            <x-form.textarea
                                id="description"
                                name="description"
                                class="block w-full"
                                required
                                autofocus
                                autocomplete="description"
                            >{{ old('description', $menu->description) }}</x-form.textarea>
                            <x-form.error :messages="$errors->get('description')" />
                        </div>
                        <div>
                            <x-form.label
                            for="orderno"
                            :value="__('Order No')"
                            class="mb-2"
                            />
                            <x-form.input
                                id="orderno"
                                name="orderno"
                                type="number"
                                class="block w-full"
                                :value="old('orderno', $menu->orderno)"
                                required
                                autocomplete="orderno"
                            />
                            <x-form.error :messages="$errors->get('orderno')" />
                        </div>
                        <div>
                            <x-form.label
                                for="link"
                                :value="__('Link')"
                                class="mb-2"
                                />
                            <x-form.input
                                id="link"
                                name="link"
                                type="text"
                                class="block w-full"
                                :value="old('link', $menu->link)"
                                required
                                autocomplete="link"
                            />
                            <x-form.error :messages="$errors->get('link')" />
                        </div>
                        <div>
                            <x-form.label
                                for="icon"
                                :value="__('Icon (ex: ti ti-user)')"
                                class="mb-2"
                                />
                            <x-form.input
                                id="icon"
                                name="icon"
                                type="text"
                                class="block w-full"
                                :value="old('icon', $menu->icon)"
                                autocomplete="icon"
                            />
                            <x-form.error :messages="$errors->get('icon')" />
                        </div>
                        <div>
                            <x-form.label for="published" :value="__('Menu Status')" class="mb-2" />
                            <x-form.select 
                                name="published" 
                                id="published" 
                                :value="$menu->published"
                                emptyText="Choose Menu Status"
                            >
                                <option value="1" {{ old('published', $menu->published) == 1 ? 'selected' : '' }}>
                                    Active
                                </option>
                                <option value="0" {{ old('published', $menu->published) == 0 ? 'selected' : '' }}>
                                    Inactive
                                </option>
                            </x-form.select>
                            <x-form.error :messages="$errors->get('published')" />
                        </div>
                        <div class="flex justify-start gap-4">
                            <x-button>
                                {{ __('Update') }}
                            </x-button>
                            <x-button variant="secondary"  href="/setup/menu-cms">
                                {{ __('Cancel') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
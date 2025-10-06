<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Delete Role') }}
        </h2>
    </x-slot>

    <div class="card h-full p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800">
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                <form method="POST" action="{{ route('user-cms.destroy', $user->id) }}" class="flex flex-col gap-6">
                    @method('DELETE')
                    @csrf
                    <div>
                        <x-form.label for="role_id" :value="__('Role User')" class="mb-2" />
                        <x-form.select 
                            name="role_id" 
                            id="role_id"
                            :value="old('role_id', $user->role_id)"
                            emptyText="Choose Role User"
                            withicon="true"
                            disabled="true"
                            class="border-orange-200 focus:border-orange-500"
                        >
                            <x-slot name="icon">
                                <i class="ti ti-user text-orange-400"></i>
                            </x-slot>

                            @php
                                $currentValue = old('role_id', $user->role_id);
                            @endphp

                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" {{ $currentValue == $role->id ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </x-form.select>
                        <x-form.error :messages="$errors->get('role_id')" />
                    </div>
                    <div>
                        <x-form.label
                            for="name"
                            :value="__('Full Name')"
                            class="mb-2"
                        />
                        <x-form.input
                            id="name"
                            name="name"
                            type="text"
                            class="block w-full"
                            :value="old('name', $user->name)"
                            disabled="true"
                            autocomplete="name"
                        />
                        <x-form.error :messages="$errors->get('name')" />
                    </div>
                    <div>
                        <x-form.label
                            for="username"
                            :value="__('Username')"
                            class="mb-2"
                        />
                        <x-form.input
                            id="username"
                            name="username"
                            type="text"
                            class="block w-full"
                            :value="old('username', $user->username)"
                            disabled="true"
                            autocomplete="username"
                        />
                        <x-form.error :messages="$errors->get('username')" />
                    </div>
                    <div>
                        <x-form.label
                            for="email"
                            :value="__('Email')"
                            class="mb-2"
                        />
                        <x-form.input
                            id="email"
                            name="email"
                            type="text"
                            class="block w-full"
                            :value="old('email', $user->email)"
                            disabled="true"
                            autocomplete="email"
                        />
                        <x-form.error :messages="$errors->get('email')" />
                    </div>
                    <div>
                        <x-form.label
                            for="password"
                            :value="__('Password')"
                            class="mb-2"
                        />
                        <x-form.input
                            id="password"
                            name="password"
                            type="password"
                            class="block w-full"
                            :value="old('password')"
                            disabled="true"
                            autocomplete="password"
                        />
                        <x-form.error :messages="$errors->get('password')" />
                    </div>
                    <div>
                        <x-form.label for="is_active" :value="__('Status')" class="mb-2" />
                        <x-form.select 
                            name="is_active" 
                            id="is_active" 
                            :value="$user->is_active"
                            disabled="true"
                            emptyText="Choose User Status"
                        >
                            <option value="1" {{ old('is_active', $user->is_active) == 1 ? 'selected' : '' }}>
                                Active
                            </option>
                            <option value="0" {{ old('is_active', $user->is_active) == 0 ? 'selected' : '' }}>
                                Inactive
                            </option>
                        </x-form.select>
                        <x-form.error :messages="$errors->get('is_active')" />
                    </div>
                    <div class="flex justify-start gap-4">
                        <x-button>
                            {{ __('Delete') }}
                        </x-button>
                        <x-button variant="secondary" href="/setup/user-cms">
                            {{ __('Cancel') }}
                        </x-button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
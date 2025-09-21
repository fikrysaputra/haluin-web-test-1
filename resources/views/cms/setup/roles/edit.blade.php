<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Roles') }}
        </h2>
    </x-slot>

    <div class="card h-full p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800">
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                <form method="POST" action="/setup/roles/{{ $role->id }}" class="flex flex-col gap-6">
                    @method('PUT')
                    @csrf
                    <div>
                       <x-form.label
                            for="name"
                            :value="__('Nama Role')"
                            class="mb-2"
                        />
                        <x-form.input
                            id="name"
                            name="name"
                            type="text"
                            class="block w-full"
                            :value="old('name', $role->name)"
                            required
                            autofocus
                            autocomplete="name"
                        />
                        <x-form.error :messages="$errors->get('name')" />
                    </div>
                    <div>
                        <x-form.label
                            for="description"
                            :value="__('Deskripsi Role')"
                            class="mb-2"
                        />
                        <x-form.textarea
                            id="description"
                            name="description"
                            class="block w-full"
                            required
                            autocomplete="description"
                        >{{ old('description', $role->description) }}</x-form.textarea>
                        <x-form.error :messages="$errors->get('description')" />
                    </div>
                    <div class="flex justify-start gap-4">
                      <x-button>
                            {{ __('Update') }}
                        </x-button>
                        <x-button variant="secondary" href="/setup/roles">
                            {{ __('Cancel') }}
                        </x-button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
@php
    $isEdit = isset($company);
@endphp

<div class="space-y-6">
    <div>
        <x-input-label for="name" :value="'Name'" />
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $company->name ?? '')" required />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="email" :value="'Email'" />
        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $company->email ?? '')" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="website" :value="'Website'" />
        <x-text-input id="website" name="website" type="url" class="mt-1 block w-full" :value="old('website', $company->website ?? '')" />
        <x-input-error :messages="$errors->get('website')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="logo" :value="'Logo (min 100x100)'" />
        <input id="logo" name="logo" type="file" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:rounded-md file:border-0 file:bg-gray-100 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-gray-700 hover:file:bg-gray-200" />
        <x-input-error :messages="$errors->get('logo')" class="mt-2" />

        @if ($isEdit && $company->logo_path)
            <div class="mt-4">
                <div class="text-sm text-gray-600">Current logo</div>
                <img src="{{ Storage::url($company->logo_path) }}" alt="{{ $company->name }}" class="mt-2 h-20 w-20 rounded object-cover ring-1 ring-gray-200" />
            </div>
        @endif
    </div>
</div>

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Companies
            </h2>
            <x-primary-button onclick="window.location='{{ route('companies.create') }}'">
                Add Company
            </x-primary-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="mb-6 rounded-md bg-green-50 px-4 py-3 text-sm text-green-700">
                    {{ session('status') }}
                </div>
            @endif

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($companies->count() === 0)
                        <p class="text-sm text-gray-600">No companies found.</p>
                    @else
                        <div class="overflow-x-auto">
                            <div class="mx-auto w-full">
                                <table class="w-full divide-y divide-gray-200 text-left">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th
                                                class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">
                                                Name
                                            </th>
                                            <th
                                                class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">
                                                Email
                                            </th>
                                            <th
                                                class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">
                                                Website
                                            </th>
                                            <th
                                                class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">
                                                Logo
                                            </th>
                                            <th
                                                class="px-3 py-3 text-right text-xs font-medium uppercase tracking-wide text-gray-500">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        @foreach ($companies as $company)
                                            <tr>
                                                <td class="px-3 py-3 text-sm text-gray-900">
                                                    <a class="text-indigo-600 hover:text-indigo-900"
                                                        href="{{ route('companies.show', $company) }}">
                                                        {{ $company->name }}
                                                    </a>
                                                </td>
                                                <td class="px-3 py-3 text-sm text-gray-600">{{ $company->email ?? '-' }}</td>
                                                <td class="px-3 py-3 text-sm text-gray-600">
                                                    @if ($company->website)
                                                        <a class="text-indigo-600 hover:text-indigo-900"
                                                            href="{{ $company->website }}" target="_blank" rel="noopener">
                                                            {{ $company->website }}
                                                        </a>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="px-3 py-3 text-sm text-gray-600">
                                                    @if ($company->logo_path)
                                                        <img class="h-10 w-10 rounded object-cover ring-1 ring-gray-200"
                                                            src="{{ Storage::url($company->logo_path) }}"
                                                            alt="{{ $company->name }}">
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="px-3 py-3 text-right text-sm">
                                                    <div class="flex items-center justify-end gap-2">
                                                        <a class="text-indigo-600 hover:text-indigo-900"
                                                            href="{{ route('companies.edit', $company) }}">
                                                            Edit
                                                        </a>
                                                        <form method="POST" action="{{ route('companies.destroy', $company) }}"
                                                            onsubmit="return confirm('Delete this company?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="text-red-600 hover:text-red-900">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="mt-6">
                            {{ $companies->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

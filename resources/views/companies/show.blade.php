<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ $company->name }}
            </h2>
            <div class="flex items-center gap-2">
                <x-secondary-button onclick="window.location='{{ route('companies.edit', $company) }}'">
                    Edit
                </x-secondary-button>
                <x-primary-button onclick="window.location='{{ route('companies.index') }}'">
                    Back to Companies
                </x-primary-button>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-4xl space-y-6 sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="rounded-md bg-green-50 px-4 py-3 text-sm text-green-700">
                    {{ session('status') }}
                </div>
            @endif

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex flex-col items-start gap-6 md:flex-row md:items-center md:justify-between">
                        <div class="flex items-center gap-6">
                            <div class="h-24 w-24 overflow-hidden rounded-xl bg-gray-100 ring-1 ring-gray-200">
                                @if ($company->logo_path)
                                    <img class="h-full w-full object-cover" src="{{ Storage::url($company->logo_path) }}"
                                        alt="{{ $company->name }}">
                                @endif
                            </div>
                        </div>
                        <div class=" mt-4 flex justify-between p-4 w-full md:max-w-xl">
                            <div>
                                <div class="text-xs uppercase tracking-wide text-gray-400">Company Email</div>
                                <div class="mt-1 text-sm text-gray-900">{{ $company->email ?? '-' }}</div>
                            </div>
                            <div>
                                <div class="text-xs uppercase tracking-wide text-gray-400">Company Website</div>
                                <div class="mt-1 text-sm text-gray-900">
                                    @if ($company->website)
                                        <a class="text-indigo-600 hover:text-indigo-900" href="{{ $company->website }}"
                                            target="_blank" rel="noopener">
                                            {{ $company->website }}
                                        </a>
                                    @else
                                        -
                                    @endif
                                </div>
                            </div>
                            <div>
                                <div class="text-xs uppercase tracking-wide text-gray-400">No. of Employees</div>
                                <div class="mt-1 text-sm text-gray-900">{{ $company->employees->count() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold">Employees</h3>
                        <x-primary-button
                            onclick="window.location='{{ route('employees.create', ['company_id' => $company->id]) }}'">
                            Add Employee
                        </x-primary-button>
                    </div>

                    <div class="mt-4">
                        @if ($company->employees->isEmpty())
                            <p class="text-sm text-gray-600">No employees yet.</p>
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
                                                    Phone
                                                </th>
                                                <th
                                                    class="px-3 py-3 text-right text-xs font-medium uppercase tracking-wide text-gray-500">
                                                    Actions
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 bg-white">
                                            @foreach ($company->employees as $employee)
                                                <tr>
                                                    <td class="px-3 py-3 text-sm text-gray-900">
                                                        <a class="text-indigo-600 hover:text-indigo-900"
                                                            href="{{ route('employees.show', $employee) }}">
                                                            {{ $employee->first_name }} {{ $employee->last_name }}
                                                        </a>
                                                    </td>
                                                    <td class="px-3 py-3 text-sm text-gray-600">{{ $employee->email ?? '-' }}
                                                    </td>
                                                    <td class="px-3 py-3 text-sm text-gray-600">{{ $employee->phone ?? '-' }}
                                                    </td>
                                                    <td class="px-3 py-3 text-right text-sm">
                                                        <a class="text-indigo-600 hover:text-indigo-900"
                                                            href="{{ route('employees.edit', $employee) }}">
                                                            Edit
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

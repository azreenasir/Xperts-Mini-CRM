<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ $employee->first_name }} {{ $employee->last_name }}
            </h2>
            <div class="flex items-center gap-2">
                <x-secondary-button onclick="window.location='{{ route('employees.edit', $employee) }}'">
                    Edit
                </x-secondary-button>
                <x-primary-button onclick="window.location='{{ route('employees.index') }}'">
                    Back to Employees
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
                    <div class="grid gap-6 md:grid-cols-2">
                        <div>
                            <div class="text-sm text-gray-500">Company</div>
                            <div class="text-base text-gray-900">
                                @if ($employee->company)
                                    <a class="text-indigo-600 hover:text-indigo-900"
                                        href="{{ route('companies.show', $employee->company) }}">
                                        {{ $employee->company->name }}
                                    </a>
                                @else
                                    -
                                @endif
                            </div>
                        </div>
                        <div>
                            <div class="text-sm text-gray-500">Email</div>
                            <div class="text-base text-gray-900">{{ $employee->email ?? '-' }}</div>
                        </div>
                        <div>
                            <div class="text-sm text-gray-500">Phone</div>
                            <div class="text-base text-gray-900">{{ $employee->phone ?? '-' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

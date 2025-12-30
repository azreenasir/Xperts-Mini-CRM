<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Edit Employee
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('employees.update', $employee) }}" class="space-y-6">
                        @csrf
                        @method('PUT')
                        @include('employees.partials.form', ['employee' => $employee])

                        <div class="flex items-center gap-3">
                            <x-primary-button>
                                Update
                            </x-primary-button>
                            <x-secondary-button type="button" onclick="window.location='{{ route('employees.show', $employee) }}'">
                                Cancel
                            </x-secondary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

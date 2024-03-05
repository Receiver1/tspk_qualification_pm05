<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Админ панель') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="py-6">
            <div class="grid sm:grid-cols-1 lg:grid-cols-2 gap-6">

                @foreach ($statements as $statement)
                    <div class="w-full mx-auto">
                        <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                            <div class="min-h-72 p-6 text-gray-900 dark:text-gray-100 flex flex-col justify-around">
                                <div>
                                    <div class="text-gray-500">{{ __("Номер заявления: ") }}</div>
                                    <div>{{ $statement->id }}</div>
                                </div>
                                <div>
                                    <div class="text-gray-500">{{ __("ФИО: ") }}</div>
                                    <div>{{ $statement->user->fullName() }}</div>
                                </div>
                                <div>
                                    <div class="text-gray-500">{{ __("Номер автомобиля: ") }}</div>
                                    <div>{{ $statement->license_plate }}</div>
                                </div>
                                <div>
                                    <div class="text-gray-500">{{ __("Описание: ") }}</div>
                                    <div class="whitespace-pre-wrap">{{ $statement->description }}</div>
                                </div>
                                <div class="mt-4">
                                    <div class="text-gray-500">{{ __("Статус: ") }}</div>
                                    <form method="POST" action="{{ route('admin.changeStatus', ['statement' => $statement->id]) }}">
                                        @csrf

                                        <select class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" name="status" onchange="this.form.submit()">
                                            <option value="created" {{ $statement->status == 'created' ? 'selected' : '' }}>Новое</option>
                                            <option value="confirmed" {{ $statement->status == 'confirmed' ? 'selected' : '' }}>Подтверждено</option>
                                            <option value="denied" {{ $statement->status == 'denied' ? 'selected' : '' }}>Отклонено</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        <div class="pb-6">
            {{ $statements->links() }}
        </div>
    </div>

</x-app-layout>
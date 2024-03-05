<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Админ панель') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="py-6">
            <div class="grid sm:grid-cols-1 lg:grid-cols-2 gap-6">

                <div class="w-full mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                        <div class="min-h-72 p-6 text-gray-900 dark:text-gray-100 flex flex-col justify-around">
                            <div>
                                <div class="text-gray-500">{{ __("Номер заявления: ") }}</div>
                                <div>1488</div>
                            </div>
                            <div>
                                <div class="text-gray-500">{{ __("ФИО: ") }}</div>
                                <div>Яша Лава</div>
                            </div>
                            <div>
                                <div class="text-gray-500">{{ __("Номер автомобиля: ") }}</div>
                                <div>Х715УЙ 163</div>
                            </div>
                            <div>
                                <div class="text-gray-500">{{ __("Описание: ") }}</div>
                                <div class="whitespace-pre-wrap">{{ __("asdasdasdas") }}</div>
                            </div>
                            <div class="mt-4">
                                <div class="text-gray-500">{{ __("Статус: ") }}</div>
                                <select class="block mt-1 w-full rounded-lg border border-gray-300">
                                    <option value="pending">Ожидает</option>
                                    <option value="processing">В процессе</option>
                                    <option value="completed">Завершено</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


</x-app-layout>
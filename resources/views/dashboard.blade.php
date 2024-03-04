<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Мои заявления') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class = "grid grid-cols-2 gap-1 ">

        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="min-h-72 p-6 text-gray-900 dark:text-gray-100 flex flex-col justify-around">
                    <div>
                        <div class="text-gray-500">{{ __("Номер заявления: ") }}</div>
                        <div>1488</div>
                    </div>
                    <div>
                        <div class="text-gray-500">{{ __("Статус заявления: ") }}</div>
                        <div>Пошёл нахуй</div>
                    </div>
                    <div>
                        <div class="text-gray-500">{{ __("Номер автомобиля: ") }}</div>
                        <div>Х715УЙ 163</div>
                    </div>
                    <div>
                        <div class="text-gray-500">{{ __("Описание: ") }}</div>
                        <div class="whitespace-pre-wrap break-words">{{
                            __("asdasdasdas")
                            }}</div>
                    </div>
                </div>
            </div>
        </div>


        </div>
    </div>
</x-app-layout>

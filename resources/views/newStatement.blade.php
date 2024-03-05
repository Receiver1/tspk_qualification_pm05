<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Новое заявление') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <form method="POST" action="{{ route('statement.create') }}" class="mt-6 space-y-6">
                    @csrf
                    <!-- car number -->
                    <div>
                        <x-input-label for="carNumber" :value="__('Номер машины')" />
                        <x-text-input id="carNumber" class="block mt-1 w-full" type="text" name="carNumber"
                            :value="old('carNumber')" required autofocus />
                        <x-input-error :messages="$errors->get('carNumber')" class="mt-2" />
                    </div>
        
                    <!-- description -->
                    <div>
                        <x-input-label for="description" :value="__('Описание')" />
                        
                        <!-- Используем textarea для многострочного ввода -->
                        <textarea id="description" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" name="description"
                            required>{{ old('description') }}</textarea>
                            
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>
        
                    <div>
                        <x-primary-button class="mt-6">
                            {{ __('Отправить') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-app-layout>

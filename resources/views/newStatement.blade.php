<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Новое заявление') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="w-full h-full flex items-center justify-center">
            <div class="bg-white p-8 rounded-lg shadow-md w-4/12">
                <form method="POST" action="{{ route('newStatement') }}">
                    @csrf
                    <!-- car number -->
                    <div>
                        <x-input-label for="carNumber" :value="__('Номер машины')" />
                        <x-text-input id="carNumber" class="block mt-1 w-full" type="text" name="carNumber"
                            :value="old('carNumber')" required autofocus />
                        <x-input-error :messages="$errors->get('carNumber')" class="mt-2" />
                    </div>
        
                    <!-- description -->
                    <div class="mt-4">
                        <x-input-label for="description" :value="__('Описание')" />
                        
                        <!-- Используем textarea для многострочного ввода -->
                        <textarea id="description" class="block mt-1 w-full rounded-lg border border-gray-300" name="description"
                            required>{{ old('description') }}</textarea>
                            
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>
        
                    <div class="flex items-center justify-center mt-4">
                        <x-primary-button class="ms-3">
                            {{ __('Отправить') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-app-layout>

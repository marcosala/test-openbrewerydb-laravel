<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Elenco birre') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach($beers as $beer)
                    <div class="p-4 text-gray-900">
                        {{ $beer}}
                    </div>
                @endforeach     
            </div>
        </div>
    </div>
</x-app-layout>

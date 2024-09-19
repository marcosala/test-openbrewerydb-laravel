<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Elenco birrerie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">   
                @foreach ($breweries as $brewery)
                    <div class="p-2 text-gray-900"> <!-- Padding ridotto a p-2 -->
                        {{ $brewery['name'] }} - {{ $brewery['city'] }}, {{ $brewery['state'] }}
                    </div>
                @endforeach
                <hr/>
                <div class="flex justify-between items-center p-4">
                    <div class="hidden sm:flex sm:items-center sm:justify-between">
                        <div class="flex items-center">
                            @for ($i = 1; $i <= $totalPages; $i++)
                                <a href="{{ route('breweries.index', ['page' => $i]) }}" 
                                   class="ml-2 @if ($i == $currentPage) text-red-600 font-bold @else text-gray-500 hover:text-gray-700 @endif">
                                   {{ $i }}
                                </a>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
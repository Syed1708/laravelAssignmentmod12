<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buses') }}

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('trips.show') }}" method="POST">
                        @csrf
                 

                        @if ($errors->any())
                        <div class="text-red-600">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                        <div class="mb-4">
                            <label for="departure_location_id">Departure Location:</label>
                            @error('departure_location_id')
                                <p class=" text-red-600">{{ $message }}</p>
                                @enderror
                            <select name="departure_location_id">
                                @foreach($locations as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                            <div class="mb-4">
                            <label for="arrival_location_id">Arrival Location:</label>
                            @error('arrival_location_id')
                                <p class=" text-red-600">{{ $message }}</p>
                                @enderror
                            <select name="arrival_location_id">
                                @foreach($locations as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
    
                          </div>
        
                    <div class="mb-4">
                        <label for="date" class="block text-sm font-medium text-gray-600">Date</label>
                        <input type="date" name="date" id="date" :value="old('date')"  class="mt-1 p-2 w-full border border-gray-300 rounded">
                         {{-- @error('date')
                    <p class=" text-red-600">{{ $message }}</p>
                    @enderror --}}

                    <div class="mt-4">
                        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Search</button>
                    </div>

                    </form>

                </div>
            </div>
        </div>
        
    </div>
</x-app-layout>



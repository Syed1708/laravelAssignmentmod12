<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bus') }}

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h1 class="text-2xl font-bold mb-8">Add Bus</h1>

                    <form action="{{ route('buses.store') }}" method="POST">
                        @csrf
                        
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
            
                        {{-- <div class="mb-4">
                            <label for="departure_from" class="block text-sm font-medium text-gray-600">From</label>
                            <input type="text" name="departure_from" id="departure_from" :value="old('departure_from')" class="mt-1 p-2 w-full border border-gray-300 rounded">
                            @error('departure_from')
                            <p class=" text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
            
                        <div class="mb-4">
                            <label for="arrival_to" class="block text-sm font-medium text-gray-600">To</label>
                            <input type="text" name="arrival_to" id="arrival_to"  :value="old('arrival_to')" class="mt-1 p-2 w-full border border-gray-300 rounded">
                            @error('arrival_to')
                            <p class=" text-red-600">{{ $message }}</p>
                            @enderror
                        </div> --}}
            
                        <div class="mb-4">
                            <label for="date" class="block text-sm font-medium text-gray-600">Date</label>
                            <input type="date" name="date" id="date" :value="old('date')"  class="mt-1 p-2 w-full border border-gray-300 rounded">
                             @error('date')
                        <p class=" text-red-600">{{ $message }}</p>
                        @enderror
                        </div>
            
                        <div class="mb-4">
                            <label for="time" class="block text-sm font-medium text-gray-600">Time</label>
                            <input type="time" name="time" id="time" :value="old('time')"  class="mt-1 p-2 w-full border border-gray-300 rounded">
                             @error('time')
                        <p class=" text-red-600">{{ $message }}</p>
                        @enderror
                        </div>
            
                        <div class="mb-4">
                            <label for="duration" class="block text-sm font-medium text-gray-600">Duration(Hours)</label>
                            <input type="text" name="duration" id="duration" :value="old('duration')"  class="mt-1 p-2 w-full border border-gray-300 rounded">
                            @error('duration')
                            <p class=" text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
            
                        <div class="mb-4">
                            <label for="seats" class="block text-sm font-medium text-gray-600">Seats</label>
                            <input type="number" name="seats" id="seats" :value="old('seats')"  class="mt-1 p-2 w-full border border-gray-300 rounded">
                             @error('seats')
                        <p class=" text-red-600">{{ $message }}</p>
                        @enderror
                        </div>
            
                        <div class="mb-4">
                            <label for="price" class="block text-sm font-medium text-gray-600">Price</label>
                            <input type="text" name="price" id="price" :value="old('price')"  class="mt-1 p-2 w-full border border-gray-300 rounded">
                             @error('pricz')
                        <p class=" text-red-600">{{ $message }}</p>
                        @enderror
                        </div>
            
            
                        <div class="mt-4">
                            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Create</button>
                        </div>
                    </form>

                    


                    

                </div>
            </div>
        </div>
        
    </div>
</x-app-layout>



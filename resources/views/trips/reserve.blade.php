<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reservation Form') }}

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('trips.confirm') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $bus->id }}">

                    <div class="mb-4">
                        <label for="trip_name" class="block text-sm font-medium text-gray-600">Trip Name</label>
                        <input type="text" name="trip_name" id="trip_name" :value="old('trip_name')" class="mt-1 p-2 w-full border border-gray-300 rounded">
                        @error('trip_name')
                        <p class=" text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="no_of_tickets" class="block text-sm font-medium text-gray-600">Number of Tickets:</</label>
                        <input type="number" name="no_of_tickets" id="no_of_tickets"  :value="old('no_of_tickets')" class="mt-1 p-2 w-full border border-gray-300 rounded">
                        @error('no_of_tickets')
                        <p class=" text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
        
                    <div class="mb-4">
                        <label for="seat_number" class="block text-sm font-medium text-gray-600">Seat Number</label>
                        <input type="text" name="seat_number" id="seat_number" :value="old('seat_number')"  class="mt-1 p-2 w-full border border-gray-300 rounded">
                         @error('seat_number')
                    <p class=" text-red-600">{{ $message }}</p>
                    @enderror

                    <div class="mt-4">
                        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Confirm Reservation</button>
                    </div>

                    </form>

                </div>
            </div>
        </div>
        
    </div>
</x-app-layout>



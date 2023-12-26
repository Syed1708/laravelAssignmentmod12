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

                    <h1 class="text-2xl font-bold mb-8">Edit Bus</h1>
                    {{-- {{ $bus}} --}}

                    <form action="{{ route('buses.update', $bus->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @if ($errors->any())
                        <div class="text-red-600">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        {{-- <div class="mb-4">
                            <label for="bus_number" class="block text-sm font-medium text-gray-600">Bus Number</label>
                            <input type="text" name="bus_number" id="bus_number" value="{{ $bus->bus_number }}" class="mt-1 p-2 w-full border border-gray-300 rounded">
                        </div> --}}
            
                        <div class="mb-4">
                            <label for="departure_from" class="block text-sm font-medium text-gray-600">From</label>
                            <input type="text" name="departure_from" id="departure_from" value="{{ $bus->departure_from }}" class="mt-1 p-2 w-full border border-gray-300 rounded">
                        </div>
            
                        <div class="mb-4">
                            <label for="arrival_to" class="block text-sm font-medium text-gray-600">To</label>
                            <input type="text" name="arrival_to" id="arrival_to" value="{{ $bus->arrival_to  }}" class="mt-1 p-2 w-full border border-gray-300 rounded">
                        </div>
            
                        <div class="mb-4">
                            <label for="date" class="block text-sm font-medium text-gray-600">Date</label>
                            <input type="date" name="date" id="date" value="{{ $bus->date }}" class="mt-1 p-2 w-full border border-gray-300 rounded">
                        </div>
            
                        <div class="mb-4">
                            <label for="time" class="block text-sm font-medium text-gray-600">Time</label>
                            <input type="text" name="time" id="time" value="{{ $bus->time }}" class="mt-1 p-2 w-full border border-gray-300 rounded">
                        </div>
            
                        <div class="mb-4">
                            <label for="duration" class="block text-sm font-medium text-gray-600">Duration(Hours)</label>
                            <input type="text" name="duration" id="duration" value="{{ $bus->duration }}" class="mt-1 p-2 w-full border border-gray-300 rounded">
                        </div>
            
                        <div class="mb-4">
                            <label for="seats" class="block text-sm font-medium text-gray-600">Seats</label>
                            <input type="number" name="seats" id="seats" value="{{ $bus->seats }}" class="mt-1 p-2 w-full border border-gray-300 rounded">
                        </div>
            
                        <div class="mb-4">
                            <label for="price" class="block text-sm font-medium text-gray-600">Price</label>
                            <input type="number" name="price" id="price" value="{{ $bus->price }}" class="mt-1 p-2 w-full border border-gray-300 rounded">
                        </div>
            
                       
            
                        <div class="mt-4">
                            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Update</button>
                        </div>
                    </form>

                    


                    

                </div>
            </div>
        </div>
        
    </div>
</x-app-layout>



<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Bus Available") }}
            

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                        {{-- {{ $availableBuses }} --}}
                       
                     
                    @foreach ($buses as $bus)

                   
                        {{-- {{ $bus->seats}} --}}
                        <div class="flex items-center mb-4">
                            <span class="font-semibold mr-2">Departure From:</span>
                            <span>{{ $bus->departureLocation->name }}</span>
                        </div>
                        <div class="flex items-center mb-4">
                            <span class="font-semibold mr-2">Arrival To:</span>
                            <span>{{ $bus->arrivalLocation->name }}</span>
                        </div>
                        
                        <div class="flex items-center mb-4">
                            <span class="font-semibold mr-2">Date:</span>
                            <span>{{ $bus->date }}</span>
                        </div>
                
        
                  

                    <div class="mt-4">
                        <a class=" text-white bg-green-600 p-2 rounded-md shadow-md" href="{{ route('trips.reserve', $bus->id)}}">Book This Trip</a>
                        
                    </div>
                   

                @endforeach
                      
                
                       
                
                    


                    

                </div>
            </div>
        </div>
        
    </div>
</x-app-layout>



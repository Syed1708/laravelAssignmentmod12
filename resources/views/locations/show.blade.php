<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Bus No  $bus->bus_number  details") }}
            

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                        
                
                        <div class="flex items-center mb-4">
                            <span class="font-semibold mr-2">Departure From:</span>
                            <span>{{ $bus->departure_from }}</span>
                        </div>
                
                        <div class="flex items-center mb-4">
                            <span class="font-semibold mr-2">Arrival To:</span>
                            <span>{{ $bus->arrival_to }}</span>
                        </div>
                
                        <div class="flex items-center mb-4">
                            <span class="font-semibold mr-2">Date:</span>
                            <span>{{ $bus->date }}</span>
                        </div>
                
                        <div class="flex items-center mb-4">
                            <span class="font-semibold mr-2">Time:</span>
                            <span>{{ $bus->time }}</span>
                        </div>
                
                        <div class="flex items-center mb-4">
                            <span class="font-semibold mr-2">Duration:</span>
                            <span>{{ $bus->duration }}</span>
                        </div>
                
                        <div class="flex items-center mb-4">
                            <span class="font-semibold mr-2">Price:</span>
                            <span>${{ $bus->price }}</span>
                        </div>
                
                        <div class="flex items-center mb-4">
                            <span class="font-semibold mr-2">Total Seats:</span>
                            <span>{{ $bus->seats }}</span>
                        </div>
                
                    


                    

                </div>
            </div>
        </div>
        
    </div>
</x-app-layout>



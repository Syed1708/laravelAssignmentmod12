<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Trips') }}

        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <a class=" text-indigo-50 mb-4 bg-green-600 p-4 rounded-lg shadow-lg" href="{{ route('trips.search') }}">Make a New Trip</a> </h1>


                              <p class=" text-right">
                     @if(session('success'))

                     <div class="  text-green-400 p-4 mb-4 text-right font-mono font-semibold">
                         {{ session('success')}}
                     </div>
                         
                     @endif
                    </p>

                    <h1 class="text-2xl mt-6 font-bold mb-8">My Trip List</h1>

                    <table class="min-w-full bg-white border border-gray-300">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">Trip Name</th>
                                <th class="py-2 px-4 border-b">Departure From</th>
                                <th class="py-2 px-4 border-b">Arrival To</th>
                                <th class="py-2 px-4 border-b">Price</th>
                                <th class="py-2 px-4 border-b">No of Ticket</th>
                                <th class="py-2 px-4 border-b">User Name</th>
                                <th class="py-2 px-4 border-b">Seat Number</th>
                                {{-- <th class="py-2 px-4 border-b">Actions</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($trips as $trip)
                                <tr >
                                    <td class=" text-center py-2 px-4 border-b">{{ $trip->trip_name }}</td>

                                    <td class=" text-center py-2 px-4 border-b">{{ $trip->departureLocation->name }}</td>
                                    <td class=" text-center py-2 px-4 border-b">{{ $trip->arrivalLocation->name }}</td>
                                    <td class=" text-center py-2 px-4 border-b">{{ $trip->bus->price }}</td>

                                    <td class=" text-center py-2 px-4 border-b">{{ $trip->no_of_tickets }}</td>
                                    <td class=" text-center py-2 px-4 border-b">{{ optional($trip->user)->name }}
                                    </td>

                                    
                                    <td class=" text-center py-2 px-4 border-b">
                                        @foreach ($trip->seatAllocations as $seatAllocation)
                                        {{ $seatAllocation->seat_number  }}
                                        @endforeach
                                    </td>
                                    
                                   
                                   
                                    {{-- <td class=" text-center py-2 px-4 border-b">
                                        <a class=" text-white bg-green-600 p-2 rounded-md shadow-md" href="{{ route('buses.show', $trip->id)}}">View</a>
                                        <a class=" text-white bg-green-600 p-2 rounded-md shadow-md" href="{{ route('buses.edit', $trip->id)}}">Edit</a>
                                        <form action="{{ route('buses.destroy', $trip->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                        
                                            <button onclick="return confirm('Are you sure to delete ??')" class=" mt-2 text-white bg-red-500 p-2 rounded-md shadow-md">Delete</button>
                                            
                                       
                                        </form>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                      
                    <div class=" p-4">
                        {{ $trips->Links() }}
                    </div>

                    

                </div>
            </div>
        </div>
        
    </div>
</x-app-layout>



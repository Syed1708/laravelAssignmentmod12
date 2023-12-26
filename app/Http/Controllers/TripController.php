<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Trip;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Models\SeatAllocation;

class TripController extends Controller
{
        /**
     * Display a listing of the resource.
     */


     public function search()
     {
        $locations = Location::pluck('name', 'id');
        
    
         return view('trips.search', compact('locations'));
     }

     public function show(Request $request)
     {
        // dd($request->all());
        $request->validate([
               
            'departure_location_id' => ['required',],
            'arrival_location_id' => ['required',],
            'date' => ['required', 'date',],
            
        ]);


        $buses = Bus::with('departureLocation', 'arrivalLocation')
        ->where('departure_location_id', $request->departure_location_id)
        ->where('arrival_location_id', $request->arrival_location_id)
        ->where('date', $request->date)
        ->where('seats', '>', 0)
        ->get();

    // Check if any available bus exists
    if ($buses->isEmpty()) {
        return view('trips.404');
    }

    // dd($availableBuses);

    return view('trips.show', compact('buses'));
    // return redirect('create')->with('availableBuses', $availableBuses);
         
     }



    public function reserve($id)
    {
        // Get the selected bus details
        $bus = Bus::findOrFail($id);

        return view('trips.reserve', compact('bus'));
    }


    public function confirm(Request $request)
{

    //  dd($request->all());
    // Validate the form data
    $request->validate([
        'id' => ['required', 'exists:buses,id'],
        'trip_name' => ['required', 'string'],
        'no_of_tickets' => ['required', 'numeric', 'min:1'],
        'seat_number' => ['required', 'string'],
    ]);

    // Get the bus and check if enough available seats
    $bus = Bus::findOrFail($request->id);

    //  dd($bus);

    if ($bus->seats < $request->no_of_tickets) {
        // dd('Not Ok');
        return view('trips.404');
    }

    // Create a trip
    $trip = Trip::create([
        'user_id' => auth()->user()->id,
        'bus_id' => $bus->id,
        'departure_location_id' => $bus->departure_location_id,
        'arrival_location_id' => $bus->arrival_location_id,
        'trip_name' => $request->trip_name,
        'no_of_tickets' => $request->no_of_tickets,
        
    ]);

    // Create seat allocations
    $seatNumbers = explode(',', $request->seat_number);
    foreach ($seatNumbers as $seatNumber) {
        SeatAllocation::create([
            'user_id' => auth()->user()->id,
            'trip_id' => $trip->id,
            'seat_number' => trim($seatNumber),
        ]);
    }

    // Update bus information
    $bus->seats -= $request->no_of_tickets;
    $bus->save();

    return redirect()->route('trips.index')->with('success', 'Reservation confirmed successfully.');
}

    public function index()
    {
        $trips = Trip::with('user', 'bus', 'seatAllocations','departureLocation','arrivalLocation')->latest()->paginate(1);

        // dd($trips);

        return view('trips.index', compact('trips'));
        
    }


   

    public function edit($id)
    {
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bus $bus)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bus $bus)
    {
        //
       
    }
}

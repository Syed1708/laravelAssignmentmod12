<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $buses = Bus::latest()->paginate(5);
        $buses = Bus::with('departureLocation', 'arrivalLocation')->latest()->paginate(1);
        return view('bus.index', compact('buses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $locations = Location::pluck('name', 'id');
        return view('bus.create', compact('locations'));
    
        // return view('bus.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Bus $bus)
    {
        //
            //validation
            $request->validate([
               
                // "bus_number"=> ["required","numeric", Rule::unique(Bus::class, 'bus_number')],
                // 'departure_from' => ['required', 'string',],
                // 'arrival_to' => ['required', 'string',],
                 'departure_location_id' => ['required',],
                'arrival_location_id' => ['required',],
                'date' => ['required', 'date',],
                'time' => ['required',],
                'duration' => ['required','string'],
                'seats' => ['required','integer'],
                'price' => ['required', 'integer',],
                
            ]);
    
            // if pass all validation then create a new product
            $bus->create([
                // 'bus_number' => $request->bus_number,
                // 'departure_from' => $request->departure_from,
                // 'arrival_to' => $request->arrival_to,
                'departure_location_id' => $request->departure_location_id,
                'arrival_location_id' => $request->arrival_location_id,
                'date' => $request->date,
                'time' => $request->time,
                'duration' => $request->duration,
                'seats' => $request->seats,
                'price' => $request->price,
            ]);
    
            // then return to the product list page i mean products.index route
    
            return redirect()->route('buses.index')->with('success', 'Bus added successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $bus = Bus::with('departureLocation', 'arrivalLocation')->latest()->find($id);
        // dd($bus);
        // dd($products);
        return view('bus.show')->with('bus', $bus);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bus = Bus::latest()->find($id);
        $locations = Location::pluck('name', 'id');
        // dd($bus);
        return view('bus.edit', compact('bus','locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bus $bus)
    {
        //
            //validation
            $request->validate([
               
                'departure_location_id' => ['required',],
                'arrival_location_id' => ['required',],
                'date' => ['required', 'date',],
                'time' => ['required',],
                'duration' => ['required','string'],
                'seats' => ['required','integer'],
                'price' => ['required', 'integer',],
                
            ]);
    
            // if pass all validation then create a new product
            $bus->update([
                // 'bus_number' => $request->bus_number,
                'departure_location_id' => $request->departure_location_id,
                'arrival_location_id' => $request->arrival_location_id,
                'date' => $request->date,
                'time' => $request->time,
                'duration' => $request->duration,
                'seats' => $request->seats,
                'price' => $request->price,
            ]);
    
            // then return to the product list page i mean products.index route
    
            return redirect()->route('buses.index')->with('success', 'Bus updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bus $bus)
    {
        //
        $bus->delete();

        return redirect()->route('buses.index')->with('success', 'Bus deleted successfully!');
    }
}

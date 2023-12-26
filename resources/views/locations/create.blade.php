<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Location') }}

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h1 class="text-2xl font-bold mb-8">Add Location</h1>

                    <form action="{{ route('locations.store') }}" method="POST">
                        @csrf
                        

            
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-600">Location Name</label>
                            <input type="text" name="name" id="name" :value="old('name')" class="mt-1 p-2 w-full border border-gray-300 rounded">
                            @error('name')
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



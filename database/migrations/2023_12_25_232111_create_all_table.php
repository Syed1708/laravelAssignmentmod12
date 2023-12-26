<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('buses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('departure_location_id')->constrained('locations');
            $table->foreignId('arrival_location_id')->constrained('locations');
            
            $table->date('date');
            $table->time('time');
            $table->string('duration');
            $table->integer('seats');
            $table->integer('price',);
           

            $table->timestamps();
        });



        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('departure_location_id')->constrained('locations');
            $table->foreignId('arrival_location_id')->constrained('locations');
            
            $table->foreignId('user_id')->constrained(); // Foreign key referencing the 'id' column in 'users' table
            $table->foreignId('bus_id')->constrained(); 

            $table->string('trip_name');
            $table->integer('no_of_tickets');
            
            $table->timestamps();
        });

        Schema::create('seat_allocations', function (Blueprint $table) {
            $table->id();

            $table->integer('seat_number');
            $table->foreignId('user_id')->constrained(); // Foreign key to users table
            $table->foreignId('trip_id')->constrained();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
        Schema::dropIfExists('buses');
        Schema::dropIfExists('trips');
        Schema::dropIfExists('seat_allocations');
    }
};

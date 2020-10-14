<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pickup_address');
            $table->string('dropoff_address');
            $table->string('client_name');
            $table->string('client_phone_number');
            $table->string('pickup_date');
            $table->string('pickup_time');
            $table->string('courier_name');
            $table->string('courier_phone_number');
            $table->integer('number_of_labour')->nullable();
            $table->text('comments')->nullable();
            $table->string('vehicle')->nullable();
            $table->float('price');
            // $table->boolean('is_booking_active')->default(1);
            $table->enum('is_booking_active', ['activated', 'deactivated'])->default('activated');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}

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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
          
            $table->string('name',50);
            $table->string('brand',200);
            $table->string('model',200);
            $table->integer('year');
            $table->string('car_type',100);
            $table->decimal('daily_rent_price',10,2);
            $table->tinyInteger('availability');
            $table->string('image',200);


            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};

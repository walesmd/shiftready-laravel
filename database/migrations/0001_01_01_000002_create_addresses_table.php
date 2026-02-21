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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('place_id')->nullable()->unique();
            $table->string('raw_address');
            $table->string('formatted_address')->nullable();
            $table->decimal('lat', 10, 7)->nullable();
            $table->decimal('lng', 11, 7)->nullable();
            $table->timestamp('geocoded_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};

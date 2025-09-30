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
        Schema::create('island_meta_data', function (Blueprint $table) {
            $table->id();
            $table->double('easting')->nullable();
            $table->double('northing')->nullable();
            $table->double('lat')->nullable();
            $table->double('long')->nullable();
            $table->double('lwl_peri')->nullable();
            $table->double('lwl_area')->nullable();
            $table->double('hwl_peri')->nullable();
            $table->double('hwl_area')->nullable();
            $table->double('mwl_peri')->nullable();
            $table->double('mwl_area')->nullable();

            $table->foreignId('island_id')->unique()->constrained('islands', 'id')->cascadeOnDelete();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('island_meta_data');
    }
};

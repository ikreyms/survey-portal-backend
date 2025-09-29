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
        Schema::create('plate_format_ranges', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('start');
            $table->integer('end');

            $table->foreignId('plate_format_id')->constrained('plate_formats', 'id')->cascadeOnDelete();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plate_format_ranges');
    }
};

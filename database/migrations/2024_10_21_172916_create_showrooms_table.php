<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('showrooms', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_plate_number')->primary();
            $table->foreignId('vehicle_id')->unique()->primary()
                ->references('id')
                ->on('vehicles');

            $table->foreignId('from_user_id')
                ->references('id')
                ->on('users');

            $table->foreignId('to_user_id')
                ->nullable()
                ->references('id')
                ->on('users');

            $table->float('price');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('showrooms');
    }
};

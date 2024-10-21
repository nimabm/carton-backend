<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('user_vehicles', function (Blueprint $table) {
            $table->foreignId('user_id')
                ->references('id')
                ->on('users');
            $table->string('vehicle_id');
            $table->string('showroom_id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_vehicles');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('plate_number')->primary();
            $table->string('type')->index();
            $table->integer('gas_remain')->default(2);
            $table->integer('gas_max')->default(2);
            $table->integer('health')->default(100);
            $table->json('metadata')->default(json_encode([]));
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehicle');
    }
};

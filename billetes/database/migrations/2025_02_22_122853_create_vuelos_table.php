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
        Schema::create('vuelos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('codigo', 6)->unique();
            $table->string('aeropuerto_origen', 3);
            $table->string('aeropuerto_destino', 3);
            $table->string('compañia_aerea');
            $table->integer('plazas_totales');
            $table->decimal('precio', 6, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vuelos');
    }
};

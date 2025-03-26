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
        Schema::create('planning_activite', function (Blueprint $table) {
            $table->foreignId('planning_id')->constrained('plannings');
            $table->foreignId('activite_id')->constrained('activites');
            $table->primary(['planning_id', 'activite_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planning_activites');
    }
};

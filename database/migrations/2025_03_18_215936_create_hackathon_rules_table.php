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
        Schema::create('hackathon_rules', function (Blueprint $table) {
            $table->foreignId('hackathon_id')->constrained('hackathons');
            $table->foreignId('rule_id')->constrained('rules');
            $table->primary(['hackathon_id', 'rule_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hackathon_rules');
    }
};

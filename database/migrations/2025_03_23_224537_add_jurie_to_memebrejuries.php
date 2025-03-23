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
        Schema::table('memberjuries', function (Blueprint $table) {

            $table->foreign('jurie_id')->references('id')->on('juries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('memberjuries', function (Blueprint $table) {
   $table->dropForeign(['jurie_id']);

   $table->dropColumn('jurie_id');        });
    }
};

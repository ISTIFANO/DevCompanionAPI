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
            $table->dropForeign(['role_id']); 
            $table->dropColumn("role_id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('memberjuries', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }
};

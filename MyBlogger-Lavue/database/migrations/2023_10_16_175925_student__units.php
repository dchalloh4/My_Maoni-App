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
        //
        Schema::create('Student_Units', function (Blueprint $table) {
            $table->id();
            $table->string('Unit CODE')->unique();
            $table->string('Unit Name', 64)->unique();
            $table->string('Unit Description', 128);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::drop('Student_Units');
    }
};

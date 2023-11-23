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
        Schema::table("Unit_Lecturer", function (Blueprint $table) {
            $table->string('unit_Name');
            $table->foreign('unit_Name')->references('UNIT Name')->on('Units');
            $table->string('unit_Lecturer');
            $table->foreign('unit_Lecturer')->references('name')->on('Lecturers_DB2');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

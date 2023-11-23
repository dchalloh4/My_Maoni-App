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
        Schema::create('Unit_Lecturer', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('UNIT_id');
            $table->foreign('UNIT_id')->references('id')->on('Units');
            $table->unsignedBigInteger('LEC_id');
            $table->foreign('LEC_id')->references('id')->on('Lecturers_DB2');
            $table->timestamps();

            // $table->primary(['UNIT_id', 'LEC_id']);


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};

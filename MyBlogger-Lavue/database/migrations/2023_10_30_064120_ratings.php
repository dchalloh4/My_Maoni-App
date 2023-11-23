<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::table("users", function (Blueprint $table) {
            $table->decimal('rating',3,1)->nullable()->defaultValue(0.0);
        });
    DB::statement('ALTER TABLE users ADD CONSTRAINT rating_check_range CHECK (rating >= 0.1 AND rating <= 5.0)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('rating');
        });
    }
};

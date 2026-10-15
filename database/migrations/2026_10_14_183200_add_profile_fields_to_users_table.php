<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone', 30)->nullable();
            $table->string('city', 120)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('blood_type', 10)->nullable();
            $table->string('insurance', 150)->nullable();
            $table->string('affiliate', 50)->nullable();
            $table->text('medical_notes')->nullable();
            $table->json('preferences')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'phone',
                'city',
                'date_of_birth',
                'blood_type',
                'insurance',
                'affiliate',
                'medical_notes',
                'preferences',
            ]);
        });
    }
};

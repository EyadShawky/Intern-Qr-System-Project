<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            // Auto-incrementing ID column
            $table->unsignedBigInteger('id')->autoIncrement();
            // Other columns in your table
            $table->string('role');
            // ... Add more columns as needed ...
            $table->timestamps();
        });

        DB::table('roles')->insert([
            [
                'role' => 'Super Admin'
            ],
            [
                'role' => 'Admin'
            ],
            [
                'role' => 'User'
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('roles');
    }
};

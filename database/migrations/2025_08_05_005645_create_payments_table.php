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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('iduser')->constrained('users')->onDelete('cascade');
            $table->enum('period', ['mingguan', 'bulanan', 'tahunan']);
            $table->decimal('nominal', 10, 2);
            $table->string('petugas'); // bisa diganti jadi foreign key jika petugas juga user
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};

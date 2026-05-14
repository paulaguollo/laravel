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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('arrival');
            $table->string('departure');
            $table->date('date');
            $table->integer('passagers_number') -> nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations. //corre com rollback
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};

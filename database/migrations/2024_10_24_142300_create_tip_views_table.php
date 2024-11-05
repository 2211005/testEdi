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
        Schema::create('tip_views', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tip_id');
            $table->timestamp('viewed_at')->nullable();
            $table->timestamps();
    
            // Relación con la tabla tips
            $table->foreign('tip_id')->references('id')->on('tips')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tip_views');
    }
};

<?php

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

        Schema::create('noticia_usuario', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
            $table->foreignId('noticia_id')->constrained();
            $table->primary(['user_id', 'noticia_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('noticia_usuario');
    }
};

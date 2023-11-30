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
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->index('user_id');
            $table->foreignId('user_id')->constrained('users');
            $table->char('numero', 9);
            $table->float('valor', 8, 2);
            $table->date('data_emissao')->nullable();
            $table->char('cnpj_remetente');
            $table->char('nome_remetente', 100);
            $table->char('cnpj_transportador');
            $table->char('nome_transportador', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notas');
    }
};

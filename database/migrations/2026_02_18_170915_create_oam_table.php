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
        Schema::create('oams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('autorizzato_ad_operare');
            $table->string('persona');
            $table->string('codice_fiscale', 16)->unique();
            $table->string('domicilio_sede_legale');
            $table->string('elenco');
            $table->string('numero_iscrizione');
            $table->date('data_iscrizione')->nullable();
            $table->string('stato');
            $table->date('data_stato')->nullable();
            $table->text('causale_stato_note')->nullable();
            $table->timestamps();

            $table->index('codice_fiscale');
            $table->index('elenco');
            $table->index('stato');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mediatore_creditizios');
    }
};

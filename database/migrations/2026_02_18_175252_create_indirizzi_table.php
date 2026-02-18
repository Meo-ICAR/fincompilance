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
        Schema::create('indirizzi', function (Blueprint $table) {
            $table->id();

            // --- Chiave Esterna ---
            $table->morphs('indirizzable');

            // --- Polimorfica Indirizzo ---
            $table->enum('tipo_indirizzo', [
                'RESIDENZA',  // XML: <Residenza> (Solo PF)
                'DOMICILIO',  // XML: <Domicilio> (Solo PF)
                'SEDE_LEGALE',  // XML: <SedeLegale> (Solo PG)
                'SEDE_OPERATIVA',  // XML: <SedeOperativa> (Solo PG)
            ])->comment("Determina il tag XML genitore dell'indirizzo.");

            // --- Dati Indirizzo (Struttura Comune) ---
            $table
                ->string('indirizzo', 100)
                ->comment('XML: <Indirizzo>. Max 100 char.');

            $table
                ->string('numero_civico', 15)
                ->nullable()
                ->comment('XML: <NrCivico>. Max 15 char.');

            $table
                ->string('cap', 10)
                ->comment('XML: <CAP>. 5 cifre per Italia.');

            $table
                ->string('comune', 60)
                ->comment('XML: <Comune>. Nome del comune o Codice Catastale (es. H501).');

            $table
                ->string('provincia', 2)
                ->nullable()
                ->comment('XML: <Provincia>. Sigla (es. RM). Obbligatorio per Italia.');

            $table
                ->string('codice_stato_estero', 4)
                ->default('Z086')
                ->comment('XML: <Stato>. Codice Catastale nazione. Z086 = Italia.');

            // --- Specifici per Sede Operativa (PG) ---
            $table
                ->string('codice_interno_sede')
                ->nullable()
                ->comment('XML: <CodiceInternoSede>. Identificativo interno del mediatore.');

            $table->timestamps();

            // --- Indici ---
            $table->index(['indirizzable_id', 'indirizzable_type']);
            $table->index('tipo_indirizzo');
            $table->index('cap');
            $table->index('comune');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indirizzi');
    }
};

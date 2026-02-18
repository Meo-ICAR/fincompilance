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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();

            // --- 1. Riferimenti al Cliente (Debitore) ---
            // Usiamo sia la FK (per velocità) che il CF (per storico/compliance)
            $table->foreignId('customer_id')->nullable()->constrained()->onDelete('restrict');
            $table
                ->string('customer_fiscal_code', 16)
                ->index()
                ->comment('CF del cliente al momento della stipula (Snaphost storico)');

            // --- 2. Riferimenti al Collaboratore (Agente / Segnalatore) ---
            $table->foreignId('agent_id')->nullable()->constrained('users')->onDelete('set null');
            $table
                ->string('agent_fiscal_code', 16)
                ->index()
                ->comment("CF dell'agente che ha caricato la pratica. Fondamentale per OAM.");

            // --- 3. Riferimenti al Mandante (Banca / Finanziaria) ---
            $table
                ->foreignId('mandante_id')
                ->constrained('mandates')
                ->comment("L'istituto che eroga il finanziamento (es. Findomestic, Santander)");

            // --- Dati Pratica ---
            $table
                ->string('practice_number')
                ->unique()
                ->comment('Numero pratica assegnato dalla Banca/Finanziaria');

            $table
                ->string('internal_reference')
                ->unique()
                ->nullable()
                ->comment('Nostro protocollo interno univoco');

            // --- Dettagli Finanziari ---
            $table
                ->enum('product_type', ['CQS', 'CQP', 'PRESTITO_PERSONALE', 'MUTUO', 'TFS'])
                ->comment('Tipologia prodotto (Cessione del Quinto, Delega, ecc.)');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};

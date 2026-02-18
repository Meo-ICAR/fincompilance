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
        Schema::create('practice_commissions', function (Blueprint $table) {
            $table->id();

            // Collegamento alla pratica
            $table->foreignId('loan_id')->constrained()->onDelete('cascade');

            // DA CHI ARRIVANO I SOLDI?
            // MANDANTE = Bonifico dalla Banca/Finanziaria
            // CLIENTE = Fattura di mediazione pagata dal cliente
            $table
                ->enum('payer_type', ['MANDANTE', 'CLIENTE'])
                ->comment('Fonte del compenso');

            // TIPOLOGIA DI COMPENSO
            // Upfront: Pagato subito alla liquidazione
            // Recurring: Ricorrente (es. gestione annuale)
            // Rappel: premio volume (spesso a fine anno)
            // Consultancy: Parcella consulenza cliente
            $table
                ->string('type')
                ->default('UPFRONT')
                ->comment('UPFRONT, RECURRING, RAPPEL, CONSULTANCY_FEE');

            // DATI ECONOMICI
            $table->decimal('amount_gross', 10, 2)->comment('Importo Lordo (Imponibile)');
            $table->decimal('vat_amount', 10, 2)->default(0)->comment('IVA (se applicabile)');
            $table->decimal('amount_total', 10, 2)->comment('Totale (Lordo + IVA)');

            // STATO DELL'INCASSO (Cash Flow)
            $table
                ->enum('status', ['EXPECTED', 'INVOICED', 'PAID', 'CANCELLED'])
                ->default('EXPECTED')
                ->comment("Stato del pagamento verso l'azienda");

            // RIFERIMENTI AMMINISTRATIVI
            $table->date('accrual_date')->nullable()->comment('Data di competenza economica');
            $table->date('payment_date')->nullable()->comment('Data valuta incasso');
            $table->string('invoice_number')->nullable()->comment('Numero fattura emessa vs Banca o Cliente');

            // Logica per le provvigioni agenti
            $table
                ->boolean('is_retrocession_eligible')
                ->default(true)
                ->comment("Se TRUE, questo importo genera provvigioni per l'agente");

            $table->timestamps();

            // Indici per reportistica
            $table->index(['loan_id', 'payer_type']);
            $table->index(['status', 'payment_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('practice_commissions');
    }
};

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
        Schema::create('agent_payouts', function (Blueprint $table) {
            $table->id();

            // Collegamenti
            $table->foreignId('loan_id')->constrained()->onDelete('cascade');
            $table->foreignId('agent_id')->constrained('users');  // Chi riceve i soldi

            // Collegamento diretto all'incasso (Opzionale ma consigliato)
            // "Ti pago questa cifra perché ho incassato la commissione ID X"
            $table
                ->foreignId('practice_commission_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');

            $table
                ->decimal('amount_due', 10, 2)
                ->comment("Importo da pagare all'agente");

            // CALCOLO PROVVIGIONALE
            $table
                ->decimal('calculation_base', 10, 2)
                ->comment("Importo su cui si calcola la % (solitamente l'imponibile entrata)");

            $table
                ->decimal('percentage', 5, 2)
                ->comment("Percentuale riconosciuta all'agente (es. 60.00)");

            // STATO PAGAMENTO AGENTE
            $table
                ->enum('status', ['PENDING', 'APPROVED', 'PAID', 'HELD'])
                ->default('PENDING')
                ->comment('PENDING: In attesa incasso banca, APPROVED: Inserito in fattura agente');

            $table->date('paid_at')->nullable();

            // Riferimento alla fattura che l'agente emette a TE (Azienda)
            $table->string('agent_invoice_reference')->nullable()->comment('Riferimento alla fattura  emessa da agente');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agent_payouts');
    }
};

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
        Schema::create('financials', function (Blueprint $table) {
            $table->id();

            // Codice ABI (Associazione Bancaria Italiana) - Chiave univoca reale
            // È fondamentale per il tracciamento dei bonifici e dei mandati.
            $table->string('abi_code', 5)->unique()->comment('Codice ABI a 5 cifre');

            $table->string('name')->comment('Nome ufficiale (es. AGOS DUCATO S.P.A.)');

            // Tipo Ente: BANCA o 106 (Finanziaria)
            $table
                ->enum('type', ['BANCA', 'INTERMEDIARIO_106', 'IP_IMEL'])
                ->comment('Banca o Finanziaria ex Art. 106 TUB');

            $table->string('capogruppo')->nullable()->comment('Gruppo bancario di appartenenza');

            // Stato nell'albo (Importante: se viene cancellata, i mandati decadono)
            $table->string('status')->default('OPERATIVO')->comment('OPERATIVO, CANCELLATO, IN_LIQUIDAZIONE');

            $table->date('data_iscrizione')->nullable();
            $table->date('data_cancellazione')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financials');
    }
};

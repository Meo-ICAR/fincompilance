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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Denominazione completa del Mediatore');
            $table->string('codice_fiscale', 16)->comment('Codice Fiscale (16 caratteri o 11 se coincidente con P.IVA)');
            $table->string('pec')->nullable()->comment('Indirizzo PEC per comunicazioni ufficiali');

            // --- Mapping XML <Intestazione> ---

            // Tag: <IdUserOAM>
            // Esempio: "IdUserOAM1"
            $table
                ->string('oam_code', 50)
                ->unique()
                ->comment("XML: <IdUserOAM>. Codice identificativo univoco rilasciato dall'OAM.");

            $table->string('email')->unique();
            $table->string('phone', 20);
            $table->string('website')->nullable();
            $table->text('description')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->index('codice_fiscale');
            $table->index('email');
            $table->index('active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};

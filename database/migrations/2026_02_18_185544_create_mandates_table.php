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
        Schema::create('mandates', function (Blueprint $table) {
            $table->id();

            $table->foreignId('financial_id')->constrained('financials');

            $table->string('codice_mandato_interno')->nullable()->comment('Codice assegnato dalla finanziaria');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->boolean('is_active')->default(true);

            // Prodotti abilitati per questo mandato (es. CQS, Prestiti Personali, Mutui)
            $table->json('authorized_products')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mandates');
    }
};

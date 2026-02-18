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
        Schema::create('collaborators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');

            $table
                ->string('name')
                ->comment('Per PF: <Cognome>. Per PG: <Denominazione>.');
            $table->string('firstname');
            $table->string('codice_fiscale', 16)->comment('Codice Fiscale (16 caratteri o 11 se coincidente con P.IVA)');
            $table
                ->string('oam_code', 50)
                ->unique()
                ->comment("XML: <IdUserOAM>. Codice identificativo univoco rilasciato dall'OAM.");
            $table->date('birth_date')->nullable();
            $table->string('birth_place')->nullable();
            $table
                ->string('codice_interno_sede')
                ->nullable()
                ->comment('XML: <CodiceInternoSede>. Identificativo interno del mediatore.');
            $table->string('email')->unique();
            $table->string('phone', 20);
            $table->string('mobile', 20)->nullable();
            $table->date('hire_date');
            $table->date('end_date')->nullable();
            $table->boolean('active')->default(true);
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->index('company_id');
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
        Schema::dropIfExists('collaborators');
    }
};

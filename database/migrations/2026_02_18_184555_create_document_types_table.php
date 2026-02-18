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
        Schema::create('document_types', function (Blueprint $table) {
            $table->id();

            // Identificazione
            $table->string('name')->comment("Nome leggibile (es. Carta d'Identità)");
            $table->string('slug')->unique()->comment('Codice univoco per uso nel codice (es. ID_CARD, OAM_CERT)');

            // Classificazione
            $table
                ->enum('scope', ['AGENT', 'CUSTOMER', 'COMPANY', 'MANDATE'])
                ->comment('A chi appartiene questo documento?');

            $table
                ->string('category')
                ->nullable()
                ->comment('Raggruppamento UI (es. Anagrafica, Reddito, Antiriciclaggio, Contrattuale)');

            // Regole di Validazione (Business Logic)
            $table
                ->boolean('is_mandatory')
                ->default(false)
                ->comment('Se true, blocca il workflow se mancante');

            $table
                ->boolean('requires_expiration_date')
                ->default(true)
                ->comment("Se true, l'UI obbliga a inserire la data di scadenza");

            $table
                ->boolean('requires_number')
                ->default(false)
                ->comment('Se true, richiede il numero del documento (es. nr passaporto)');

            $table
                ->boolean('requires_issuer')
                ->default(false)
                ->comment("Se true, richiede l'ente di rilascio (es. Comune di Roma)");

            // Automazione Scadenze
            $table
                ->integer('default_validity_months')
                ->nullable()
                ->comment('Se presente, suggerisce la scadenza (es. 120 mesi per CI, 12 per OAM)');

            $table
                ->integer('alert_days_before_expiry')
                ->default(30)
                ->comment('Giorni di anticipo per la notifica di scadenza');

            // Compliance & Sicurezza
            $table
                ->json('allowed_mime_types')
                ->nullable()
                ->comment('Array di tipi file ammessi (es. ["application/pdf", "image/jpeg"])');

            $table
                ->boolean('is_sensitive')
                ->default(false)
                ->comment('Se true, il file viene criptato su disco o visibile solo a specifici ruoli');

            // Mapping Esterno (Opzionale)
            $table
                ->string('oam_mapping_code')
                ->nullable()
                ->comment('Codice per eventuale mapping nel flusso XML OAM');

            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_types');
    }
};

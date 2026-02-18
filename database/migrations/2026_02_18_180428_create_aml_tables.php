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
        // 1. Tabella Clienti (Soggetto dell'Antiriciclaggio)
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->comment('Agente che gestisce il cliente');  // L'agente che ha in carico il cliente

            $table->string('type')->default('PF')->comment('PF: Persona Fisica, PG: Persona Giuridica');
            $table->string('ragione_sociale_o_cognome');
            $table->string('nome')->nullable();
            $table->string('codice_fiscale', 16)->unique();
            $table->string('partita_iva', 11)->nullable();

            // PEP (Politically Exposed Person) Flag rapido
            $table->boolean('is_pep')->default(false)->comment('Se il cliente è una Persona Politicamente Esposta');
            $table->boolean('is_sanctioned')->default(false)->comment('Se presente in liste antiterrorismo/blacklists');

            $table->timestamps();
        });

        // 2. Tabella Valutazioni Antiriciclaggio (Il cuore della compliance)
        Schema::create('aml_assessments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');

            // Chi ha fatto il controllo e quando
            $table->foreignId('performed_by')->constrained('users')->comment('Operatore/Agente che ha compilato il questionario');
            $table->dateTime('performed_at')->useCurrent();
            $table->date('next_review_date')->comment('Data scadenza validità controllo (1, 2 o 3 anni in base al rischio)');

            // Profilatura del Rischio (Risk Based Approach)
            $table
                ->enum('risk_level', ['BASSO', 'MEDIO', 'ALTO', 'MOLTO_ALTO'])
                ->comment("Livello di rischio calcolato dall'algoritmo o assegnato manualmente");

            $table
                ->decimal('risk_score', 5, 2)
                ->nullable()
                ->comment('Punteggio numerico del questionario (es. 0-100)');

            // Tipo di Adeguata Verifica applicata
            $table
                ->enum('due_diligence_type', ['SEMPLIFICATA', 'ORDINARIA', 'RAFFORZATA'])
                ->comment('Obbligatorio per normativa 231/2007');

            // Dati sul comportamento e scopo
            $table->text('scopo_natura_rapporto')->comment('Descrizione obbligatoria dello scopo del rapporto continuativo');
            $table->string('origine_fondi')->comment('Da dove provengono i soldi (es. Stipendio, Eredità)');

            // Dettagli PEP (se applicabile)
            $table->text('pep_role_details')->nullable()->comment('Dettagli sulla carica pubblica ricoperta');

            // Questionario AV (Adeguata Verifica)
            // Salviamo le risposte come JSON per flessibilità (le domande cambiano spesso)
            $table->json('kyc_questionnaire_data')->comment('Dump delle risposte al questionario KYC (Know Your Customer)');

            // Stato del controllo
            $table
                ->enum('status', ['PENDING', 'APPROVED', 'REJECTED', 'EXPIRED'])
                ->default('PENDING');

            $table->timestamps();
        });

        // 3. Titolare Effettivo (Ultimate Beneficial Owner - UBO)
        // Fondamentale se il Customer è una PG (Persona Giuridica)
        Schema::create('aml_beneficial_owners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aml_assessment_id')->constrained()->onDelete('cascade');

            $table->string('nome');
            $table->string('cognome');
            $table->string('codice_fiscale', 16);
            $table->date('data_nascita');
            $table->string('comune_nascita');

            $table->decimal('ownership_percentage', 5, 2)->comment('Percentuale di possesso quote (es. 25.00%)');
            $table->boolean('is_indirect_ownership')->default(false)->comment('Se possiede quote tramite altre società');

            $table->timestamps();
        });

        // 4. Controlli Liste (Watchlist Hits)
        // Per salvare lo storico dei check su WorldCheck, EuroLista, etc.
        Schema::create('aml_watchlist_hits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aml_assessment_id')->constrained()->onDelete('cascade');

            $table->string('list_name')->comment('Nome lista (es. UN Sanctions, OFAC, PEP)');
            $table->string('match_type')->comment('Exact Match, Fuzzy Match');
            $table->text('details')->comment('Dettagli del match trovato');
            $table->boolean('is_false_positive')->default(false)->comment("Marcato come falso positivo dall'operatore");
            $table->text('resolution_notes')->nullable()->comment('Perché è stato considerato falso positivo');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aml_watchlist_hits');
        Schema::dropIfExists('aml_beneficial_owners');
        Schema::dropIfExists('aml_assessments');
        Schema::dropIfExists('customers');
    }
};

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            // --- DOCUMENTI AGENTE (Compliance Interna & OAM) ---
            [
                'name' => 'Documento di Identità (Fronte/Retro)',
                'slug' => 'AGENT_ID_CARD',
                'scope' => 'AGENT',
                'category' => 'Anagrafica',
                'requires_expiration_date' => true,
                'is_mandatory' => true,
                'requires_number' => false,
                'requires_issuer' => false,
                'default_validity_months' => 120,  // 10 anni
                'alert_days_before_expiry' => 30,
                'allowed_mime_types' => null,
                'is_sensitive' => false,
                'oam_mapping_code' => null,
                'is_active' => true,
            ],
            [
                'name' => 'Attestato Iscrizione OAM',
                'slug' => 'AGENT_OAM_CERT',
                'scope' => 'AGENT',
                'category' => 'Professionali',
                'requires_expiration_date' => true,
                'is_mandatory' => true,
                'requires_number' => false,
                'requires_issuer' => false,
                'default_validity_months' => null,
                'alert_days_before_expiry' => 60,  // Avvisa 2 mesi prima
                'allowed_mime_types' => null,
                'is_sensitive' => false,
                'oam_mapping_code' => null,
                'is_active' => true,
            ],
            [
                'name' => 'Polizza RC Professionale',
                'slug' => 'AGENT_INSURANCE',
                'scope' => 'AGENT',
                'category' => 'Professionali',
                'requires_expiration_date' => true,
                'is_mandatory' => true,
                'requires_number' => false,
                'requires_issuer' => false,
                'default_validity_months' => 12,  // Rinnovo annuale
                'alert_days_before_expiry' => 30,
                'allowed_mime_types' => null,
                'is_sensitive' => false,
                'oam_mapping_code' => null,
                'is_active' => true,
            ],
            [
                'name' => 'Visura Camerale',
                'slug' => 'AGENT_CHAMBER_COMMERCE',
                'scope' => 'AGENT',
                'category' => 'Societari',  // Per Agenti PG
                'requires_expiration_date' => true,
                'is_mandatory' => false,
                'requires_number' => false,
                'requires_issuer' => false,
                'default_validity_months' => 6,  // Vale 6 mesi
                'alert_days_before_expiry' => 30,
                'allowed_mime_types' => null,
                'is_sensitive' => false,
                'oam_mapping_code' => null,
                'is_active' => true,
            ],
            // --- DOCUMENTI CLIENTE (Antiriciclaggio & Istruttoria) ---
            [
                'name' => 'Documento Riconoscimento Cliente',
                'slug' => 'CUST_ID_CARD',
                'scope' => 'CUSTOMER',
                'category' => 'KYC',
                'requires_expiration_date' => true,
                'is_mandatory' => true,
                'requires_number' => true,
                'requires_issuer' => true,
                'default_validity_months' => null,
                'alert_days_before_expiry' => 30,
                'allowed_mime_types' => json_encode(['application/pdf', 'image/jpeg', 'image/png']),
                'is_sensitive' => true,
                'oam_mapping_code' => null,
                'is_active' => true,
            ],
            [
                'name' => 'Tessera Sanitaria / Codice Fiscale',
                'slug' => 'CUST_FISCAL_CODE',
                'scope' => 'CUSTOMER',
                'category' => 'KYC',
                'requires_expiration_date' => true,  // La TS scade
                'is_mandatory' => true,
                'requires_number' => false,
                'requires_issuer' => false,
                'default_validity_months' => null,
                'alert_days_before_expiry' => 30,
                'allowed_mime_types' => json_encode(['application/pdf', 'image/jpeg', 'image/png']),
                'is_sensitive' => true,
                'oam_mapping_code' => null,
                'is_active' => true,
            ],
            [
                'name' => 'Questionario Adeguata Verifica (Firmato)',
                'slug' => 'CUST_AML_QUESTIONNAIRE',
                'scope' => 'CUSTOMER',
                'category' => 'Antiriciclaggio',
                'requires_expiration_date' => true,
                'is_mandatory' => true,
                'requires_number' => false,
                'requires_issuer' => false,
                'default_validity_months' => 36,  // Validità 3 anni (Rischio Basso)
                'alert_days_before_expiry' => 30,
                'allowed_mime_types' => json_encode(['application/pdf']),
                'is_sensitive' => true,
                'oam_mapping_code' => null,
                'is_active' => true,
            ],
            [
                'name' => 'Ultima Busta Paga / Cedolino Pensione',
                'slug' => 'CUST_INCOME_PROOF',
                'scope' => 'CUSTOMER',
                'category' => 'Reddito',
                'requires_expiration_date' => false,
                'is_mandatory' => true,  // Per pratiche di finanziamento
                'requires_number' => false,
                'requires_issuer' => false,
                'default_validity_months' => null,
                'alert_days_before_expiry' => 30,
                'allowed_mime_types' => json_encode(['application/pdf', 'image/jpeg']),
                'is_sensitive' => false,
                'oam_mapping_code' => null,
                'is_active' => true,
            ],
            [
                'name' => 'Modulo Privacy (GDPR)',
                'slug' => 'CUST_PRIVACY_SIGNED',
                'scope' => 'CUSTOMER',
                'category' => 'Contrattuale',
                'requires_expiration_date' => false,
                'is_mandatory' => true,
                'requires_number' => false,
                'requires_issuer' => false,
                'default_validity_months' => null,
                'alert_days_before_expiry' => 30,
                'allowed_mime_types' => json_encode(['application/pdf']),
                'is_sensitive' => false,
                'oam_mapping_code' => null,
                'is_active' => true,
            ],
        ];

        DB::table('document_types')->insert($types);
    }
}

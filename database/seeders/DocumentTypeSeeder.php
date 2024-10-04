<?php

namespace Database\Seeders;

use App\Models\DocumentType;
use Illuminate\Database\Seeder;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DocumentType::insert([
            // COLOMBIA
            [
                'code'          => 'RC',
                'name'          => 'Registro cívil',
                'country'       => 'CO',
            ],
            [
                'code'          => 'TI',
                'name'          => 'Tarjeta de identidad',
                'country'       => 'CO',
            ],
            [
                'code'          => 'CC',
                'name'          => 'Cédula de ciudadanía',
                'country'       => 'CO',
            ],
            [
                'code'          => 'TE',
                'name'          => 'Tarjeta de extranjería',
                'country'       => 'CO',
            ],
            [
                'code'          => 'CE',
                'name'          => 'Cédula de extranjería',
                'country'       => 'CO',
            ],
            [
                'code'          => 'NIT',
                'name'          => 'Número de identificación tributaria',
                'country'       => 'CO',
            ],
            [
                'code'          => 'PP',
                'name'          => 'Pasaporte',
                'country'       => 'CO',
            ],
            [
                'code'          => 'PEP',
                'name'          => 'Permiso especial de permanencia',
                'country'       => 'CO',
            ],
            [
                'code'          => 'DIE',
                'name'          => 'Documento de identificación extranjero',
                'country'       => 'CO',
            ],
            // ARGENTINA
            [
                'code' => 'DNI',
                'name' => 'Documento Nacional de Identidad (DNI)',
                'country' => 'AR'
            ],
            [
                'code' => 'PAS',
                'name' => 'Pasaporte Argentino',
                'country' => 'AR'
            ],
            [
                'code' => 'LIC',
                'name' => 'Licencia de Conducir',
                'country' => 'AR'
            ],
            [
                'code' => 'PR',
                'name' => 'Permiso de Residencia',
                'country' => 'AR'
            ],
            [
                'code' => 'LC',
                'name' => 'Libreta Cívica',
                'country' => 'AR'
            ],
            [
                'code' => 'LE',
                'name' => 'Libreta de Enrolamiento',
                'country' => 'AR'
            ],
            [
                'code' => 'DNILV',
                'name' => 'DNI Libreta Verde',
                'country' => 'AR'
            ],
            [
                'code' => 'DNILC',
                'name' => 'DNI Libreta Celeste',
                'country' => 'AR'
            ],
            [
                'code' => 'DNIT',
                'name' => 'DNI Tarjeta',
                'country' => 'AR'
            ],
            [
                'code' => 'CUIT',
                'name' => 'CUIT',
                'country' => 'AR'
            ],
            [
                'code' => 'CUIL',
                'name' => 'CUIL',
                'country' => 'AR'
            ],
        ]);
    }
}

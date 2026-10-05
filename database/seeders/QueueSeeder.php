<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Str;

class QueueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $data = [
            [
            'id' => 1,
            'id_company' => 1,
            'name' => 'fila Número 1',
            'description' => 'Fila para o atendimento geral de clientes',
            'service_name' => 'Atendimento Geral',
            'service_desk' => 'Balcão 1',
            'queue_prefix' => 'A',
            'queue_total_digits' => 3,
            'queue_colors' => json_encode([
                'prefix_bg_color' => '#FFFF00',
                'prefix_text_color' => '#000000',
                'number_bg_color' => '#AAAAAA',
                'number_text_color' => '#000000',
            ]),
            'hash_code' =>Str::random(64),
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null
        ],
        [
            'id' => 2,
            'id_company' => 1,
            'name' => 'fila Número 2',
            'description' => 'Consulta Familiar',
            'service_name' => 'Consulta Familiar',
            'service_desk' => 'Balcão 2',
            'queue_prefix' => 'B',
            'queue_total_digits' => 3,
            'queue_colors' => json_encode([
                'prefix_bg_color' => '#FFFF00',
                'prefix_text_color' => '#000000',
                'number_bg_color' => '#AAAAAA',
                'number_text_color' => '#000000',
            ]),
            'hash_code' =>Str::random(64),
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null
        ],
        [
            'id' => 3,
            'id_company' => 2,
            'name' => 'fila Número 3',
            'description' => 'Consulta de Rastreio',
            'service_name' => 'Rastreio de Saúde',
            'service_desk' => 'Balcão C',
            'queue_prefix' => 'C',
            'queue_total_digits' => 2,
            'queue_colors' => json_encode([
                'prefix_bg_color' => '#FFFF00',
                'prefix_text_color' => '#000000',
                'number_bg_color' => '#AAAAAA',
                'number_text_color' => '#000000',
            ]),
            'hash_code' =>Str::random(64),
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null
        ],
    ];
        DB::table('queues')->insert($data);

        echo count($data). ' filas de espera adicionadas com sucesso. \n';
    }
}

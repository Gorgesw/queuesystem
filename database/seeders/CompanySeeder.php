<?php

namespace Database\Seeders;

use \Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         
   

        for ($index = 1; $index <=3; $index++) {
            $companies[] = [
                'company_name' => 'Empresa '. $index,
                'company_logo' => 'empresa_0' . $index . '.png',
                'uuid'         => Str::uuid(),
                'adress'       => 'Rua da Empresa'. $index. "123, Bairo Exemplo, Cidade Exemplo",
                'phone'        => '47-99999-9999'. $index,
                'email'        => 'empresa'.$index.'@gmail.com',
                'status'       => 'active',
                'created_at'   => now(),
                'updated_at'   => now(),
                'deleted_at'   => now(),
            ];
        }

        DB::table('companies')->insert($companies);

        echo count($companies). " Empresas foram criadas com sucesso \n";
    }
}

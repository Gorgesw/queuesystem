<?php

namespace Database\Seeders;

use Illuminate\Container\Attributes\DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $aUsers = [
            [
            'email' => 'sysadmin@localhost.com',
            'password' =>bcrypt('Aa123456'),
            'id_company' => 0,
            'role' => 'sys-admin',
            'active' => true
            ],
            [
            'email' => 'sysadmin2@localhost.com',
            'password' =>bcrypt('Aa123456'),
            'id_company' => 1,
            'role' => 'client-admin',
            'active' => true,
            ],
            [
            'email' => 'sysadmin3@localhost.com',
            'password' =>bcrypt('Aa123456'),
            'id_company' => 2,
            'role' => 'client-user',
            'active' => true,
            ]
        ];

        \DB::table('users')->insert($aUsers);
        echo count($aUsers) . " Usuários de teste foram criados com sucesso!";
    }
}

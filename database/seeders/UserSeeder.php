<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'Juliano Vieira',
            'email' => 'contato@juliano.com.br',
            'password' => bcrypt('abobrinha123')
        ]);
    }
}

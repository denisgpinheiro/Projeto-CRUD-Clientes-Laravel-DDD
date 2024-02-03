<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contacts')->insert([
            'nome' => Str::random(10),
            'contato' => Str::random(9),
            'email' => Str::random(10).'@example.com',
        ]);
        DB::table('contacts')->insert([
            'nome' => 'Denis Pinheiro',
            'contato' => '319995555',
            'email' => 'denisgustavopinheiro@gmail.com',
        ]);
        //
    }
}

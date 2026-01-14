<?php

namespace Database\Seeders;

use App\Models\position;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
       

     
        Position::create(['name' => 'Staff']);
        Position::create(['name' => 'Supervisor']);
        Position::create(['name' => 'Manager']);
        Position::create(['name' => 'Director']);
        Position::create(['name' => 'Intern']);
    }
}
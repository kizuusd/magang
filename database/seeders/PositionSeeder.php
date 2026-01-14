<?php

namespace Database\Seeders;

use App\Models\Position; // <--- Import Model yang benar
use Illuminate\Database\Seeder;

// Perhatikan: Ini harus extends Seeder, BUKAN extends Model
class PositionSeeder extends Seeder
{
    public function run(): void
    {
        $positions = [
            'Staff',
            'Senior Staff',
            'Supervisor',
            'Manager',
            'General Manager',
            'Director',
            'Intern / Magang'
        ];

        foreach ($positions as $pos) {
            Position::create(['name' => $pos]);
        }
    }
}
<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    public function run(): void
    {
        $divisions = [
            'Information Technology (IT)',
            'Human Resources (HR)',
            'Finance & Accounting',
            'Marketing & Sales',
            'Operations',
            'Legal',
            'General Affair'
        ];

        foreach ($divisions as $div) {
            Division::create(['name' => $div]);
        }
    }
}
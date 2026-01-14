<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use App\Models\Position;
use App\Models\Division;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class KaryawanSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID'); 

        
        $positionIds = Position::pluck('id')->toArray();
        $divisionIds = Division::pluck('id')->toArray();

        
        if (empty($positionIds) || empty($divisionIds)) {
            $this->command->warn('Harap jalankan PositionSeeder dan DivisionSeeder terlebih dahulu!');
            return;
        }

        
        for ($i = 0; $i < 50; $i++) {
            $gender = $faker->randomElement(['Laki-laki', 'Perempuan']);

            Karyawan::create([
                'name' => $faker->name($gender == 'Laki-laki' ? 'male' : 'female'),
                'gender' => $gender,
                'alamat' => $faker->address,
                'position_id' => $faker->randomElement($positionIds),
                'division_id' => $faker->randomElement($divisionIds),
                'salary' => $faker->numberBetween(4500000, 25000000), 
            ]);
        }
    }
}
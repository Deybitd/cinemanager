<?php

use App\specialty;
use Illuminate\Database\Seeder;


class SpecialtiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   

        $specialties = [
            'Oftalmologia',
            'Pediatria',
            'Neurologia'
        ];
        foreach ($specialties as $specialty)
        {
            specialty::create([
                'name' => $specialty
            ]);

        }
       
    }
}

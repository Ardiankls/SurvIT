<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\gender;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gender = new gender();
        $gender->gender = 'Laki-laki';
        $gender->save();

        $gender = new gender();
        $gender->gender = 'Perempuan';
        $gender->save();

    }
}

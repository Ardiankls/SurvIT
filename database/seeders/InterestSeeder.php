<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\interest;

class InterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $interest = new interest();
        $interest->interest = 'Tidak ada';
        $interest->save();

        $interest = new interest();
        $interest->interest = 'Olahraga';
        $interest->save();

        $interest = new interest();
        $interest->interest = 'Musik';
        $interest->save();

        $interest = new interest();
        $interest->interest = 'Buku';
        $interest->save();

        $interest = new interest();
        $interest->interest = 'Film';
        $interest->save();

        $interest = new interest();
        $interest->interest = 'Games';
        $interest->save();

        $interest = new interest();
        $interest->interest = 'Makanan';
        $interest->save();

        $interest = new interest();
        $interest->interest = 'Teknologi';
        $interest->save();

        $interest = new interest();
        $interest->interest = 'Fashion';
        $interest->save();

        $interest = new interest();
        $interest->interest = 'Seni';
        $interest->save();

        $interest = new interest();
        $interest->interest = 'Kecantikan';
        $interest->save();

    }
}

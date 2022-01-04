<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\package;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $package = new package();
        $package->description = 'Basic - Paket A';
        $package->duration = '3-4 minggu';
        $package->respondent = 50;
        $package->consultation = '0';
        $package->created_by = '0';
        $package->price = 40000;
        $package->save();

        $package = new package();
        $package->description = 'Basic - Paket B';
        $package->duration = '3-4 minggu';
        $package->respondent = 100;
        $package->consultation = '0';
        $package->created_by = '0';
        $package->price = 80000;
        $package->save();

        $package = new package();
        $package->description = 'Basic - Paket C';
        $package->duration = '2 minggu';
        $package->respondent = 50;
        $package->consultation = '0';
        $package->created_by = '0';
        $package->price = 50000;
        $package->save();

        $package = new package();
        $package->description = 'Basic - Paket D';
        $package->duration = '2 minggu';
        $package->respondent = 100;
        $package->consultation = '0';
        $package->created_by = '0';
        $package->price = 100000;
        $package->save();

        $package = new package();
        $package->description = 'Custom - Paket A';
        $package->duration = '3-4 minggu';
        $package->respondent = 100;
        $package->consultation = '2';
        $package->created_by = '1';
        $package->price = 200000;
        $package->save();

        $package = new package();
        $package->description = 'Custom - Paket B';
        $package->duration = '3-4 minggu';
        $package->respondent = 100;
        $package->consultation = 'unlimited';
        $package->created_by = '1';
        $package->price = 800000;
        $package->save();

        $package = new package();
        $package->description = 'Custom - Paket C';
        $package->duration = '1-2 minggu';
        $package->respondent = 100;
        $package->consultation = '3';
        $package->created_by = '1';
        $package->price = 320000;
        $package->save();

        $package = new package();
        $package->description = 'Custom - Paket D';
        $package->duration = '1-2 minggu';
        $package->respondent = 100;
        $package->consultation = 'unlimited';
        $package->created_by = '1';
        $package->price = 920000;
        $package->save();
    }
}

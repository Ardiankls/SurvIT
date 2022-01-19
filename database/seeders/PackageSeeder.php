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
        $package->description = 'Free';
        $package->duration = 'Tidak Ada';
        $package->respondent = 25;
        $package->consultation = '0';
        $package->created_by = '0';
        $package->price = 0;
        $package->point = 50;
        $package->save();

        $package = new package();
        $package->description = 'Basic - Paket A';
        $package->duration = '1-2 minggu';
        $package->time = 14;
        $package->respondent = 100;
        $package->consultation = '0';
        $package->created_by = '0';
        $package->price = 155000;
        $package->point = 400;
        $package->save();

        $package = new package();
        $package->description = 'Basic - Paket B';
        $package->duration = '3-4 minggu';
        $package->time = 28;
        $package->respondent = 100;
        $package->consultation = '0';
        $package->created_by = '0';
        $package->price = 135000;
        $package->point = 200;
        $package->save();

        $package = new package();
        $package->description = 'Basic - Paket C';
        $package->duration = '1-2 minggu';
        $package->time = 14;
        $package->respondent = 50;
        $package->consultation = '0';
        $package->created_by = '0';
        $package->price = 95000;
        $package->point = 400;
        $package->save();

        $package = new package();
        $package->description = 'Basic - Paket D';
        $package->duration = '3-4 minggu';
        $package->time = 28;
        $package->respondent = 50;
        $package->consultation = '0';
        $package->created_by = '0';
        $package->price = 75000;
        $package->point = 200;
        $package->save();

        $package = new package();
        $package->description = 'Custom - Paket A';
        $package->duration = '1-2 minggu';
        $package->time = 14;
        $package->respondent = 100;
        $package->consultation = '3';
        $package->created_by = '1';
        $package->price = 190000;
        $package->point = 400;
        $package->save();

        $package = new package();
        $package->description = 'Custom - Paket B';
        $package->duration = '3-4 minggu';
        $package->time = 28;
        $package->respondent = 100;
        $package->consultation = '3';
        $package->created_by = '1';
        $package->price = 170000;
        $package->point = 200;
        $package->save();

        $package = new package();
        $package->description = 'Custom - Paket C';
        $package->duration = '1-2 minggu';
        $package->time = 14;
        $package->respondent = 50;
        $package->consultation = '2';
        $package->created_by = '1';
        $package->price = 130000;
        $package->point = 400;
        $package->save();

        $package = new package();
        $package->description = 'Custom - Paket D';
        $package->duration = '3-4 minggu';
        $package->time = 28;
        $package->respondent = 50;
        $package->consultation = '2';
        $package->created_by = '1';
        $package->price = 110000;
        $package->point = 200;
        $package->save();
    }
}

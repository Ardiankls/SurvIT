<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\province;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $province = new province();
        $province->province = 'Tidak ada';
        $province->save();

        $province = new province();
        $province->province = 'Aceh';
        $province->save();

        $province = new province();
        $province->province = 'Bali';
        $province->save();

        $province = new province();
        $province->province = 'Kepulauan Bangka Belitung';
        $province->save();

        $province = new province();
        $province->province = 'Banten';
        $province->save();

        $province = new province();
        $province->province = 'Bengkulu';
        $province->save();

        $province = new province();
        $province->province = 'Jawa Tengah';
        $province->save();

        $province = new province();
        $province->province = 'Kalimantan Tengah';
        $province->save();

        $province = new province();
        $province->province = 'Sulawesi Tengah';
        $province->save();

        $province = new province();
        $province->province = 'Jawa Timur';
        $province->save();

        $province = new province();
        $province->province = 'Kalimantan Timur';
        $province->save();

        $province = new province();
        $province->province = 'Nusa Tenggara Timur';
        $province->save();

        $province = new province();
        $province->province = 'Gorontalo';
        $province->save();

        $province = new province();
        $province->province = 'Daerah Khusus Ibukota Jakarta';
        $province->save();

        $province = new province();
        $province->province = 'Jambi';
        $province->save();

        $province = new province();
        $province->province = 'Lampung';
        $province->save();

        $province = new province();
        $province->province = 'Maluku';
        $province->save();

        $province = new province();
        $province->province = 'Kalimantan Utara';
        $province->save();

        $province = new province();
        $province->province = 'Maluku Utara';
        $province->save();

        $province = new province();
        $province->province = 'Sulawesi Utara';
        $province->save();

        $province = new province();
        $province->province = 'Sumatra Utara';
        $province->save();

        $province = new province();
        $province->province = 'Papua';
        $province->save();

        $province = new province();
        $province->province = 'Riau';
        $province->save();

        $province = new province();
        $province->province = 'Kepulauan Riau';
        $province->save();

        $province = new province();
        $province->province = 'Sulawesi Tenggara';
        $province->save();

        $province = new province();
        $province->province = 'Kalimantan Selatan';
        $province->save();

        $province = new province();
        $province->province = 'Sulawesi Selatan';
        $province->save();

        $province = new province();
        $province->province = 'Sumatra Selatan';
        $province->save();

        $province = new province();
        $province->province = 'Jawa Barat';
        $province->save();

        $province = new province();
        $province->province = 'Kalimantan Barat';
        $province->save();

        $province = new province();
        $province->province = 'Nusa Tenggara Barat';
        $province->save();

        $province = new province();
        $province->province = 'Papua Barat';
        $province->save();

        $province = new province();
        $province->province = 'Sulawesi Barat';
        $province->save();

        $province = new province();
        $province->province = 'Sumatra Barat';
        $province->save();

        $province = new province();
        $province->province = 'Daerah Istimewa Yogyakarta';
        $province->save();
    }
}

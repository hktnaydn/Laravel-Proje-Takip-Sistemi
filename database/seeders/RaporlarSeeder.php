<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\raporlar;

class RaporlarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        raporlar::create([
            'id'     => '1',
            'projerapor'    => 'kontrol',
            'ogretmenid'    => '500',
            'ogrno'    => '1',
            'onerino'    => '0',
            'status' => '0',
            'yuklendistatus' => '0',
        ]);
    }
}

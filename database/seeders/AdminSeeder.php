<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name'     => 'ogrenci',
            'email'    => 'ogrenci@localhost.com',
            'role'    => 'ogrenci',
            'ogretmenid'    => '1',
            'ogrno'    => '191307065',
            'password' => bcrypt('123123'),
        ]);
        Admin::create([
            'name'     => 'admin',
            'email'    => 'admin@localhost.com',
            'role'    => 'admin',
            'password' => bcrypt('123123'),
        ]);
        Admin::create([
            'name'     => 'Ahmet Aydın',
            'email'    => 'ahmetaydn@localhost.com',
            'role'    => 'ogretmen',
            'ogretmenid'    => '1',
            'password' => bcrypt('123123'),
        ]);
        Admin::create([
            'name'     => 'Mehmet Gül',
            'email'    => 'mehmetgul@localhost.com',
            'role'    => 'ogretmen',
            'ogretmenid'    => '2',
            'password' => bcrypt('123123'),
        ]);
        Admin::create([
            'name'     => 'Mahmut Çiçek',
            'email'    => 'ogretmen@localhost.com',
            'role'    => 'ogretmen',
            'ogretmenid'    => '3',
            'password' => bcrypt('123123'),
        ]);
      
    
    }
}

<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('roles')->delete();
    
        DB::table('roles')->insert([
            'id' => 3,
            'name' => 'Receptionist',
            'weight' => 0,
        ]);

        DB::table('roles')->insert([
            'id' => 4,
            'name' => 'Director',
            'weight' => 0,
        ]);

        DB::table('roles')->insert([
            'id' => 5,
            'name' => 'PNO',
            'weight' => 0,
        ]);

        DB::table('roles')->insert([
            'id' => 6,
            'name' => 'Doctor',
            'weight' => 0,
        ]);

        DB::table('roles')->insert([
            'id' => 7,
            'name' => 'Patient',
            'weight' => 0,
        ]);
    }
}

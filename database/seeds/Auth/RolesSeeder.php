<?php

use Database\traits\TruncateTable;
use Database\traits\DisableForeignKeys;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate('roles');

        $roles = [['name' => 'administrator'], ['name' => 'authenticated'], ['name' => 'Receptionist'],
            ['name' => 'PNO'], ['name' => 'Director'], ['name' => 'Doctor'], ['name' => 'Patient']
        ];

        DB::table('roles')->insert($roles);

        $this->enableForeignKeys();
    }
}
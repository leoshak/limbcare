<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin.laravel@labs64.com',
            'password' => bcrypt('admin'),
            'active' => true,
            'confirmation_code' => \Ramsey\Uuid\Uuid::uuid4(),
            'confirmed' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'usertype' => 'administrator'
        ]);

        DB::table('users_roles')->insert([
            'user_id' => '1',
            'role_id' => '1'
        ]);
    }
}

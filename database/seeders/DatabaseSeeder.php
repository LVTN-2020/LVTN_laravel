<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
    }
}
class UserSeeder extends Seeder
{
    public function run(){
        DB::table('users')->insert([
            'name'     => 'Thái Hưng',
            'address'  => '252 Cao Lỗ, p4, Quận 8',
            'phone'    => '0764641531',
            'email'    => 'hp1997tg@gmail.com',
            'password' => Hash::make(123456),
            'level'    => 2
        ]);
    }
}
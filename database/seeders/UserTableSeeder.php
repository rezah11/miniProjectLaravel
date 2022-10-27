<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->createAdminUser();
        $this->createMangerUser();
        $this->createUser();
    }

    private function createAdminUser()
    {
        User::query()->create([
            'name'=>'admin',
            'email'=>'admin@google.com',
            'password'=>bcrypt('123456'),
            'type'=>User::TYPE_ADMIN,
        ])->markEmailAsVerified();

    }


    private function createMangerUser()
    {
        User::query()->create([
            'name'=>'manager',
            'email'=>'manager@google.com',
            'password'=>bcrypt('123456'),
            'type'=>User::TYPE_MANAGER,
        ])->markEmailAsVerified();
    }

    private function createUser()
    {
        User::query()->create([
            'name'=>'rezaHosseini',
            'email'=>'reza_h11@yaoo.com',
            'password'=>bcrypt('123456'),
            'type'=>User::TYPE_USER,
        ])->markEmailAsVerified();
    }
}

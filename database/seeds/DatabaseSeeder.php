<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Model::unguard();

        $this->call(UserTableSeeder::class);

        Model::reguard();
    }

}

class UserTableSeeder extends Seeder {

    public function run() {

        //DB::table('users')->delete();

    }

}

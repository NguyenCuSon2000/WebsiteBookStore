<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = new User;
        $users->id = 1;
        $users->username = 'admin@gmail.com';
        $users->password = '$2y$10$lPk0vEaunPwbNFZlbKPPS.lmc/5vHyw67ztarngwzeBCN2egQ/xne';
        $users->status = 1;
        $users->role_id = 1;
        $users->save();
    }
}

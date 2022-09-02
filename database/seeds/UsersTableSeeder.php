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
<<<<<<< HEAD
        \DB::table('users')->truncate();
        User::insert([
            [
                'username' => 'nguyencuson28102000@gmail.com',
                'password' => '$2y$10$F/lY69QGTC1eKZFUrwDdv.W2LIPF2Cuobg4t3Qe4seQ5MZk7C0jlW',
                'email' => 'admin@gmail.com',
                'status' => 1,
                'role_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
=======
        $users = new User;
        $users->id = 1;
        $users->username = 'admin@gmail.com';
        $users->password = '$2y$10$lPk0vEaunPwbNFZlbKPPS.lmc/5vHyw67ztarngwzeBCN2egQ/xne';
        $users->status = 1;
        $users->role_id = 1;
        $users->save();
>>>>>>> 22e96a38382caf5c8e9bfd0543d910f6065af5d5
    }
}

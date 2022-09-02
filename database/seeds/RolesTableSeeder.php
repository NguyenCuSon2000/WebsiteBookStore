<?php

use Illuminate\Database\Seeder;
use App\Models\Roles;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        \DB::table('roles')->truncate();
        Roles::insert([
            [
                'name' => 'admin',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'user',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
=======
        //
        $roles = new Roles;
        $roles->id = 1;
        $roles->name = 'admin';
        $roles->status = 1;
        $roles->save();
>>>>>>> 22e96a38382caf5c8e9bfd0543d910f6065af5d5
    }
}

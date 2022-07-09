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
        //
        $roles = new Roles;
        $roles->id = 1;
        $roles->name = 'admin';
        $roles->status = 1;
        $roles->save();
    }
}

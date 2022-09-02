<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
<<<<<<< HEAD
        // $this->call(ProvincesTableSeeder::class);
        // $this->call(DistrictsTableSeeder::class);
        // $this->call(WardsTableSeeder::class);
=======
>>>>>>> 22e96a38382caf5c8e9bfd0543d910f6065af5d5
    }
}

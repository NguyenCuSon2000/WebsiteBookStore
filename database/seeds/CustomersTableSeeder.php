<?php

use Illuminate\Database\Seeder;
use App\Models\Customers;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i < 100; $i++) { 
            $customer = new Customers;
            $customer->CustomerName = 'Khách hàng '.$i;
            $customer->DateOfBirth = "2000/10/28";
            $customer->Address = 'Hà Nội';
            $customer->Phone = '0963104800';
            $customer->Email = 'nguyencuson28102000@gmail.com';
            $customer->save();

        }
    }
}

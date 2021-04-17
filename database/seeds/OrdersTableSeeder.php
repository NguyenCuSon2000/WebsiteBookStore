<?php

use Illuminate\Database\Seeder;
use App\Models\Orders;

class OrdersTableSeeder extends Seeder
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
            $order = new Orders;
            $order->OrderDate = '2021/04/14';
            $order->ShippedDate = "2000/04/20";
            $order->ShipPhone = "0963104800";
            $order->ShipAddress = 'Hà Nội';
            $order->Status = 1;
            $order->CustomerId = 1;
            $order->save();

        }

    }
}

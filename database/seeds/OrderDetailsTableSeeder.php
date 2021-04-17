<?php

use Illuminate\Database\Seeder;
use App\Models\Order_Details;

class OrderDetailsTableSeeder extends Seeder
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
            $order_detail = new Order_Details;
            $order_detail->OrderId = $i;
            $order_detail->ProductId = $i;
            $order_detail->Quantity = 5;
            $order_detail->UnitPrice = 25000;
            $order_detail->AddDate = "2021/04/14";
            $customer->save();

        }
    }
}

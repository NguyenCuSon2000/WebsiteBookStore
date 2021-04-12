<?php

use Illuminate\Database\Seeder;
use App\Models\Suppliers;

class SuppliersTableSeeder extends Seeder
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
            $supplier = new Suppliers;
            $supplier->SupplierName = 'Nhà cung cấp '.$i;
            $supplier->Address = 'Hà Nội';
            $supplier->Phone = '0963104800';
            $supplier->Email = 'nguyencuson28102000@gmail.com';
            $supplier->save();

        }

        // DB::table('suppliers')->insert([
        //     'SupplierName' => str_random(10),
        //     'Address' => str_random(20),
        //     'Phone' => str_random(10),
        //     'Email' => str_random(10).'@gmail.com'
        // ]);

        // factory(Suppliers::class, 100)->create();

    }
}

<?php

use Illuminate\Database\Seeder;
use App\Models\Products;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i < 200; $i++) { 
            $product = new Products;
            $product->ProductName = 'Sách '.$i;
            $product->Description = 'Noi dung bai viet '.$i;
            $product->Picture = '1617865932.jpg';
            $product->Price = 25000;
            $product->Status = 1;
            $product->Cate_Id = 2;
            $product->save();

            // $article = new Article;
            // $article->title = $faker->text;
            // $article->content = $faker->text;
            // $article->save();
        }
    }
}

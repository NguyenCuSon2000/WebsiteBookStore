<?php

use Illuminate\Database\Seeder;
use App\Models\CategoryProducts;

class CategoryTableSeeder extends Seeder
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
            $category = new CategoryProducts;
            $category->CategoryName = 'Bài viet '.$i;
            $category->Description = 'Noi dung bai viet '.$i;
            $category->Status = 1;
            $category->save();

            // $article = new Article;
            // $article->title = $faker->text;
            // $article->content = $faker->text;
            // $article->save();
        }
    }
}

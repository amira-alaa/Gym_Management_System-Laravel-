<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get(database_path('data/categories.json'));
        $categories = json_decode($json);
        $realCategories = Category::all();
        if(count($realCategories) == 0){
            foreach($categories as $category ){
                Category::create([
                    'name'=> $category->name
                ]);
            }
        }else{
            Category::destroy($realCategories);
        }
    }
}

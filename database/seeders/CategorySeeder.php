<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\SubCategory;
use File;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $json=File::get("database/seeders/data/categories.json");
        $data=json_decode($json);
        
        foreach ($data as $obj) {
        	$categoryD=['name'=>$obj->category,'order'=>0];
        	$category=Category::create($categoryD);
        	foreach($obj->sub_categories as $subCategory){
        		$subCategoryD=['name'=>$subCategory, 'category_id'=>$category->id];
        		SubCategory::create($subCategoryD);
        	}
        }
    }
}

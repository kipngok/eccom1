<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\SubCategory;
use Cocur\Slugify\Slugify;
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
        $slugify = new Slugify();
        foreach ($data as $obj) {
            $slug=$slugify->slugify($obj->category);
        	$categoryD=['name'=>$obj->category,'order'=>0,'slug'=>$slug];
        	$category=Category::create($categoryD);
        	foreach($obj->sub_categories as $subCategory){
                $slug2=$slugify->slugify($subCategory);
        		$subCategoryD=['name'=>$subCategory, 'category_id'=>$category->id, 'slug'=>$slug2];
        		SubCategory::create($subCategoryD);
        	}
        }
    }
}

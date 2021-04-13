<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Make;
use App\Models\VehicleModel;
use File;

class MakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $json=File::get("database/seeders/data/makes.json");
        $data=json_decode($json);

        foreach ($data as $obj) {
        	$makeD=['name'=>$obj->make,'order'=>0];
        	$make=Make::create($makeD);
        	foreach($obj->models as $model){
        		$modelD=['name'=>$model,'make_id'=>$make->id];
        		VehicleModel::create($modelD);
        	}
        }
    }
}

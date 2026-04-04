<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $json = File::get(database_path('data/plans.json'));
        $plans = json_decode($json);
        $realPlans = Plan::all();
        if(count($realPlans) == 0){
            foreach($plans as $plan ){
                Plan::create([
                    'name'=> $plan->name,
                    'description'=> $plan->description,
                    'is_active'=> $plan->is_active,
                    'duration_days'=> $plan->duration_days,
                    'price'=> $plan->price
                ]);
            }
        }
    }
}

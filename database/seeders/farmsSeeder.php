<?php

namespace Database\Seeders;

use App\Models\farms;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class farmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        farms::create(["name"=> "Federal University Farms" , "location"=> "Karachi", "area"=> "10 acres" , "timeOffset"=> 5]);
    }
}

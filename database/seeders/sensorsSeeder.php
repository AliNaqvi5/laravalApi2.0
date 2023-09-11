<?php

namespace Database\Seeders;

use App\Models\sensors;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class sensorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        sensors::create(["id"=> 1, "name"=> "Rain Sensor"]);
        sensors::create(["id"=> 2, "name"=> "Soil Moisture Sensor"]);
        sensors::create(["id"=> 3, "name"=> "Humidity Sensor"]);
        sensors::create(["id"=> 4, "name"=> "Temperature Sensor"]);
        sensors::create(["id"=> 5, "name"=> "LUX Sensor"]);
        //
    }
}

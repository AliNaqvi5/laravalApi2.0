<?php

namespace Database\Seeders;

use App\Models\controls;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class controlsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        controls::create(["nameControl"=> "waterPump"]);
    }
}

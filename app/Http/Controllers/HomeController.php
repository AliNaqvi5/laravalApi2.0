<?php

namespace App\Http\Controllers;

use App\Models\data;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data["temperature"] = data::where(["sensor_id" => 1])->first();
        $data["humidity"] = data::where(["sensor_id" => 2])->first();
        $data["lux"] = data::where(["sensor_id" => 3])->first();
        $data["soilMoisture"] = data::where(["sensor_id" => 4])->first();
        $data["rain"] = data::where(["sensor_id" => 5])->first();
        return view('home',$data);
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\controls;
use App\Models\data;
use App\Models\farms;
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
    public function index($id = 0)
    {
        $data["temperature"] = data::where(["sensor_id" => 1])->orderby("id","desc")->first();
        $data["humidity"] = data::where(["sensor_id" => 2])->orderby("id","desc")->first();
        $data["lux"] = data::where(["sensor_id" => 3])->orderby("id","desc")->first();
        $data["soilMoisture"] = data::where(["sensor_id" => 4])->orderby("id","desc")->first();
        $data["rain"] = data::where(["sensor_id" => 5])->orderby("id","desc")->first();
        $data["waterLevel"] = data::where(["sensor_id" => 6])->orderby("id","desc")->first();
        $data["farms"] = farms::where(["id" => 1])->get()[0];
        $data["controls"]["pump"] = controls::where(["id" => 1])->get()[0];
        return view('home',$data);
    }

}

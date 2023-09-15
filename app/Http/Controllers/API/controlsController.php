<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\ControlResource;
use App\Http\Resources\DataResource;
use App\Models\controls;
use Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class controlsController extends BaseController
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       $data= controls::where(["id"=>1])->get();
//       var_dump($data);
        return $this->sendResponse(ControlResource::collection($data), 'Controls retrieved successfully.');
    }
    public function waterPump(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'value' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
//        $data = controls::where(["nameControl"=>"waterPump"]);
        $data = controls::find(1);
        $data->value = $input["value"];
        $data->save();
//        var_dump($input);


        return $this->sendResponse([], 'Controls updated successfully.');
    }
}

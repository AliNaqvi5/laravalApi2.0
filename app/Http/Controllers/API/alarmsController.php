<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\alarmsResource;
use App\Models\alarms;
use Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class alarmsController extends BaseController
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(): JsonResponse
    {
        $data = data::all();

        return $this->sendResponse(DataResource::collection($data), 'Data retrieved successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required',
            'sensor_id' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
//        var_dump($input);
        $data = alarms::create($input);

        return $this->sendResponse(new alarmsResource($data), 'Alarm generated successfully.');
    }

    public function show(): JsonResponse
    {
//        $data = data::find($id);
//        data::latest()->first();
        $data = alarms::where(["acknowledge" => "no"])->orderBy('id', 'desc')->first();

        if (is_null($data)) {

            return $this->sendError('Data not found.');
        }

        return $this->sendResponse(new alarmsResource($data), 'Data retrieved successfully.');
    }
    public function ack($id): JsonResponse
    {

            $data = alarms::find($id);
            $data->acknowledge = "yes";
            $data->save();
//        $data = alarms::where(["id" => $id])->update(["acknowledge"=> "yes"]);

        return $this->sendResponse(new alarmsResource($data), 'Alarm Acknowledged successfully.');
    }
}

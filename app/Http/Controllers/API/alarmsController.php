<?php

namespace App\Http\Controllers;

use App\Http\Resources\DataResource;
use App\Models\data;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class alarmsController extends Controller
{
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
        $data = data::create($input);

        return $this->sendResponse(new DataResource($data), 'Alarm generated successfully.');
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\DataResource;
use App\Models\data;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Product;
use Validator;
use App\Http\Resources\ProductResource;
use Illuminate\Http\JsonResponse;

class DataController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
            'value' => 'required',
            'sensor_id' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
//        var_dump($input);
        $data = data::create($input);

        return $this->sendResponse(new DataResource($data), 'Data created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): JsonResponse
    {
        $data = data::find($id);

        if (is_null($data)) {
            return $this->sendError('Product not found.');
        }

        return $this->sendResponse(new DataResource($data), 'Product retrieved successfully.');
    }

    public function showRecent(): JsonResponse
    {
//        $data = data::find($id);
//        data::latest()->first();
        $data = data::orderBy('id', 'desc')->first();

        if (is_null($data)) {
            return $this->sendError('Data not found.');
        }

        return $this->sendResponse(new DataResource($data), 'Data retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function update(Request $request, data $data): JsonResponse
//    {
//        $input = $request->all();
//
//        $validator = Validator::make($input, [
//            'value' => 'required',
//            'sensor_id' => 'required'
//        ]);
//
//        if($validator->fails()){
//            return $this->sendError('Validation Error.', $validator->errors());
//        }
//
//        $data->name = $input['name'];
//        $data->detail = $input['detail'];
//        $data->save();
//
//        return $this->sendResponse(new ProductResource($product), 'Product updated successfully.');
//    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(data $data): JsonResponse
    {
        $data->delete();

        return $this->sendResponse([], 'Data deleted successfully.');
    }
}

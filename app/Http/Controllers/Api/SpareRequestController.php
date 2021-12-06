<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\SpareRequestResource;
use App\Models\SpareRequest;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class SpareRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $spareRequests = SpareRequest::all();
        return response(['spareRequests' => SpareRequestResource::collection($spareRequests), 'message' => 'Retrieved successfully']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all(); 
         $validator = Validator::make($input, [
            'photo'=>'required',
             'email'=>'required',
             'notes'=>'required',
             'make_id'=>'required',
             'model_id'=>'required',
             'status'=>'required',
             'sub_category_id'=>'required',
             'category_id'=>'required'
                ]);
         if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
         }
        $spareRequest=SpareRequest::create( $input);
         return response()->json($spareRequest);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show(SpareRequest $spareRequest)
    {
        //
         return response()->json($spareRequest);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, SpareRequest $spareRequest)
    {
        //
        $spareRequest->update($request->all());
         return response()->json($spareRequest);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SpareRequest $spareRequest)
    {
        //
        $spareRequest ->delete();
        return response(['message' => 'Deleted']);
    }
}

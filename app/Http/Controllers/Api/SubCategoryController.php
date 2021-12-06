<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Resources\SubCategoryResource;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $subCategories = SubCategory::all();
        return response(['subCategories' => SubCategoryResource::collection($subCategories), 'message' => 'Retrieved successfully']);
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
     public function subCategories($id){
        $subCategories=SubCategory::where('category_id','=',$id)->get();
         return new SubCategoryResource($subCategories);
         // return response()->json($subCategories);
        
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
            'name'=>'required',
            'slug'=>'required',
                ]);
         if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
         }
         $subCategory = SubCategory::create($input);
         return response()->json($subCategory);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
         return response()->json($subCategory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        //
         $subCategory->update($request->all());
         return response()->json($subCategory);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        //
        $subCategory->delete();
        return response(['message' => 'Deleted']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $this->authorize('viewAny', SubCategory::class);
        $subCategories = SubCategory::orderBy('created_at','desc')->paginate(20);
        return view('subCategory.index',compact('subCategories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', SubCategory::class);
        $categories = Category::all();
        return view('subCategory.create', compact('categories'));
    }

    public function subCategories($id){
        $subCategories=SubCategory::where('category_id','=',$id)->get();
        return view('subCategory.get',compact('subCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     {
        $this->authorize('create', SubCategory::class);
        $this->validate(request(),[
        'name'=>'required',
        'category_id'=>'required'
        ]);
        $input = $request->all();
        $subCategory=SubCategory::create( $input);
        return redirect('/subCategory/'.$subCategory->id);

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
        $this->authorize('view', $subCategory);
        return view('subCategory.show', compact('subCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        $this->authorize('update', $subCategory);
        return view('subCategory.edit', compact('subCategory'));
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
        $this->authorize('update', $subCategory);
        $this->validate($request(),[
        'name'=>'required',
        'category_id'=>'required'
        ]);
        $input = $request->all();
        $subCategory->update($input);
        return redirect('/subCategory/'.$subCategory->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory){
        //
        $this->authorize('delete', $subCategory);
        $subCategory->delete();
          return redirect('/subCategory');
    }
}

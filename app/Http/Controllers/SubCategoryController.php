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
        $this->authorize('viewAny', Sub_category::class);
        $categorys = Category::all();
        $subcategorys = Sub_category::orderBy('created_at','desc')->paginate(20);
        return view('subcategory.index',compact('subcategorys','categorys'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', subcategory::class);
        $category = Category::all();
        $subcategory= Sub_category::all();
        return view('subcategory.create', compact('subcategory','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     {
        $subcategory= Sub_category::all();

        
        $this->validate(request(),[
        'name'=>'required',
        'category_id'=>'required'
        ]);
        $input = $request->all();
        Sub_category::create( $input);
        return redirect('/subcategory');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\subcategorys\subcategorys  $subcategorys
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $this->authorize('subcategory.show', $subcategorys);
        $subcategory=Sub_category::find($id);
        return view('subcategory.show', compact('subcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\subcategorys\subcategorys  $subcategorys
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategory= Sub_category::all();
        $subcategory::find($id);
        return view('subcategory.edit', compact('subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\subcategorys\subcategorys  $subcategorys
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('update', $subcategorys);
        $this->validate($request(),[
        'name'=>'required',
        'category_id'=>'required'
        ]);
        $input = $request->all();
        Sub_category::update( $input);
        return redirect('/subcategory/'.$subcategorys->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\subcategorys\subcategorys  $subcategorys
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //
        $this->authorize('delete', $subcategorys);
        $subcategorys=Sub_category::find($id);
        $subcategorys->delete();
          return redirect('/subcategory');
    }
}

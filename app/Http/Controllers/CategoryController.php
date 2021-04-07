<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Sub_category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function index()
    {   
        $this->authorize('ViewAny', Category::class);
        $categories = Category::orderBy('created_at','desc')->paginate(20);
        return view('category.index',compact('categories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('Create', Category::class);
        $category= Category::all();
        return view('category.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     {
        $this->authorize('create', Category::class);
        $this->validate(request(), [
        'name'=>'required',
        'slug'=>'required',
        'order'=>'required'
        ]);
        $input = $request->all();
        $category=Category::create( $input);
        return redirect('/category/'.$category->id);

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categorys  $categorys
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // $this->authorize('view', $category);
        $category=Category::find($id);
        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categorys  $categorys
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Category $category)
    {   
        $this->authorize('update', $category);
        $category=Category::find($id);
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categorys  $categorys
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('update', $category);
         $this->validate($request(), [
        'name'=>'required',
        'slug'=>'required',
        'order'=>'required'
        ]);
        $input = $request->all();
        Category::update( $input);
        return redirect('/category/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categorys  $categorys
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //
        
        $category=Category::find($id);
        $this->authorize('delete', $category);
        $category->delete();
        return redirect('/category');
    }
}

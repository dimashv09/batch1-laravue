<?php

namespace App\Http\Controllers\Apps;

use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get categories
        $categories = Category::when(request()->q, function($categories) {
            $categories->where('name', 'like', '%' . request()->q . '%');    
        })->latest()->paginate(5);

        //set nomor perhalaman
        $currentPage = $categories->currentPage();
        $perPage = $categories->perPage();
        $startIndex = ($currentPage - 1) * $perPage;

       // return inertia
        return Inertia::render('Apps/Categories/Index', [
            'categories' => $categories,
            'startIndex' => $startIndex
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return inertia
        return Inertia::render('Apps/Categories/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2000',
            'name' => 'required|unique:categories',
        ]);

        //upload image
        $image = $request->file('image');
        $imagePath = $image->storeAs('public/categories', $image->hashName());

        //create category
        Category::create([
            'image' => $imagePath,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('apps.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(Category $category)
    {
        //return inertia
        return Inertia::render('Apps/Categories/Edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //validate
        $this->validate($request, [
            'name' => 'required|unique:categories,name,'. $category->id,
        ]);

        //check image Update
        if($request->file('image')){
            //remove old image
            Storage::disk('local')->delete('public/categories/'.basename($category->image));
            
            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/categories', $image->hasName());

            //update category with new image
            $category->update([
                'image' => $image->hashName(),
                'name' => $request->name,
                'description' => $request->description
            ]);
        }
        
            //Update category without image
        $category->update([
            'image'       => '',
            'name'        => $request->name,
            'description' => $request->description,
            
        ]);
        

        //redirect
        return redirect()->route('apps.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find category by id
        $category = Category::findOrfail($id);

        //remove image
        Storage::disk('local')->delete('public/categories/'.basename($category->image));
        
        //delete category
        $category->delete();

        //redirect
        return redirect()->route('apps.categories.index');
        
    }
}
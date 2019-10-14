<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request){

        $category = Category::create($this->validateReq());
        $this->catSession($request);
        return redirect('admin/create')->with('success', 'Category has been added!');
    }

    public function delete($id){
        $category = Category::findOrFail($id);
        return view('pages.admin.category')->with('category', $category);
    }

    public function destroy($id, Request $request){
        $category = Category::findOrFail($id);
        $allPosts = Post::where('category', '=', $category->type)->delete();
        $category->delete();

        $this->catSession($request);

        return redirect('admin/create')->with('warning', 'DELETED! The selected category was deleted!');
    }

    private function validateReq(){
        return request()->validate([
            'type' => 'required'
        ]);
    }

    private function catSession($request){
        $request->session()->forget('categories');

        $categories = Category::all();
        $request->session()->put('categories', $categories);
    }
}

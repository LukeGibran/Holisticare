<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PagesController extends Controller
{
    public function index(){
         $news = Post::where('category', '=','news')->orderBy('id', 'asc')->take(3)->get();
         $holistics = Post::where('category', '=','holistic')->orderBy('id', 'asc')->take(5)->get();
         $testimonies = Post::where('category','=', 'testimony')->orderBy('id', 'asc')->take(3)->get();
        $herbals = Post::where('category','=', 'herbal')->orderBy('id','asc')->take(5)->get();
         return view('index',compact('news', 'holistics', 'testimonies','herbals'));
    }

    public function page($cat){
        $category = $cat;
        $paginate = 3;

        if($category == 'herbal'){
            $paginate = 4;
        }else if($category == 'testimony'){
            $paginate = 5;
        }

        $data = Post::where('category', '=',$category)->orderBy('id', 'desc')->paginate($paginate);
        return view('pages.'. $category)->with('data', $data);
    }

    public function show($id){
        $data = Post::findOrFail($id);
        
        return view('pages.show', ['data' => $data] );
    }

    public function search(Request $request){
        $query = $request->input('search');
        $result = Post::where('title', 'LIKE', '%'.$query.'%')->orderBy('id', 'desc')->get();


        return view('pages.search', ['data' => $result]);
    }
    
}

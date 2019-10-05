<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $category = $request->input('category');

        if($search && !$category){

        $posts= Post::search($search)->organize();

        }else if($category && !$search){
        
        $posts= Post::category($category)->organize();
    

        } else if($search && $category){

        $posts= Post::both($search, $category)->organize();

        }else{
        
        $posts= Post::organize();

        }

        return view('pages.admin.index', ['posts' => $posts])->with('category', $this->determineCategory($category));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = Post::create($this->validateRequest());
        $this->storeImage($post);
        return redirect('/admin')->with('success','SUCCESS! Post was successfully published!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($admin)
    {
        $post = Post::findOrFail($admin);
        return view('pages.admin.edit',(['post' => $post]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update($admin)
    {
        $post = Post::findOrFail($admin);

        $post->update($this->validateRequest());

        $this->storeImage($post);

        return redirect('show/'.$post->id)->with('updated', 'UPDATED! Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($admin)
    {
        $post = Post::findOrFail($admin);
        Storage::delete('public/'.$post->image);
        $post->delete();
        
        return redirect('admin')->with('error', 'DELETED! The post has been deleted!');
    }


    private function validateRequest()
    {
        return request()->validate([
            'title' => 'required',
            'category' => 'required',
            'content' => 'required',
            'user_id' => 'required',
            'image' => 'sometimes|file|image|max:5000'
        ]);
    }

    private function storeImage($post){

        if(request()->has('image')){
            Storage::delete('public/'.$post->image);

            $post->update([
                'image' => request()->image->store('img', 'public')
            ]);

        }
    }

    private function determineCategory($category){
        switch($category){
            case 'news':
                $category = 'Holistic News';
                break;
            case 'holistic':
                $category = 'Holistic Information';
                break;
            case 'testimony':
                $category = 'Testimonies';
                break;
            case 'herbal':
                $category = 'Herbal Tea';
                break;
            default:
                $category = 'All category';
        }

        return $category;
    }
}

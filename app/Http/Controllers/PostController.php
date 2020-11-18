<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post=Post::orderBy('created_at','DESC')->paginate(20);
        return view('admin.post.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $tags=Tag::all();

        return view('admin.post.create',compact(['categories','tags']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation

        $this->validate($request,[
            'title'=>'required|unique:posts,title',
            'image'=>'required|image',
            'description'=>'required',
            'category'=>'required'

        ]);




        $post=Post::create([

            'title'=>$request->title,
            'slug'=>Str::slug($request->title),
            'image'=>'image.jpg',
            'description'=>$request->description,
            'category_id'=>$request->category,
            'user_id'=>auth()->user()->id,
            'published_at'=>Carbon::now(),
        ]);

        $post->tag()->attach($request->tags);

        //for image uplaod


            if ($request->hasFile('image')){


            $image=$request->image;
            $image_new_name=time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/post',$image_new_name);


            $post->image='/storage/post/'. $image_new_name;
            $post->save();



             Session::flash('success','Post created successfully');

             return redirect()->route('post.index');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

        return  view('admin.post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {


        $categories=Category::all();
        $tags=Tag::all();

        return  view('admin.post.edit',compact(['post','categories','tags']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => "required|unique:posts,title, $post->id",
            'description' => 'required',
            'category' => 'required',
        ]);


        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->image = 'image.jpg';
        $post->description = $request->description;
        $post->category_id = $request->category;




        $post->tag()->sync($request->tags);

        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/post/', $image_new_name);
            $post->image = '/storage/post/' . $image_new_name;
        }

        $post->save();

        Session::flash('success', 'Post updated successfully');
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post){

            if(file_exists(public_path($post->image))){

            unlink(public_path($post->image));
            }


            $post->delete();

            Session::flash('post deleted successfully');
        }

        return redirect()->route('post.index');
    }
}

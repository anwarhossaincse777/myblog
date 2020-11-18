<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
          public function home(){

              $posts=Post::orderBy('created_at','DESC')->take(5)->get();

              $recentPosts=Post::with('category')->orderBy('created_at','Desc')->paginate(9);
              return view('website.home',compact(['recentPosts','posts']));
          }

          public function about(){


              return view('website.about');
          }

          public function category(){

              return view('website.category');

          }

          public function contact(){

              return view('website.contact');

          }


          public function post($slug){

              $posts=Post::with('category','user')->where('slug',$slug)->first();
              if($posts){

                  return view('website.post',compact('posts'));
              }
            else{

                return redirect('/');
            }

          }


          public function tag(){


              return view('website.tag');
          }
}

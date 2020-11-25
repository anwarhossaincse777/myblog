<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
          public function home(){

              $posts=Post::with('category','user')->orderBy('created_at','DESC')->take(5)->get();

              $postFirst2=$posts->splice(0,2);
              $middlepost=$posts->splice(0,1);
              $lastpost=$posts->splice(0);

              $footerPosts=Post::with('category','user')->inRandomOrder('created_at','DESC')->limit(4)->get();
              $firstFooterPost=$footerPosts->splice(0,1);
              $middleFooterPost=$footerPosts->splice(0,2);
              $lastFooterPost=$footerPosts->splice(0,1);

              $recentPosts=Post::with('category')->orderBy('created_at','Desc')->paginate(9);
              return view('website.home',compact(['recentPosts','posts','postFirst2','middlepost','lastpost','firstFooterPost','middleFooterPost','lastFooterPost']));
          }

          public function about(){


              return view('website.about');
          }

          public function category($slug){

              $category=Category::where('slug',$slug)->first();
              if ($category){


              return view('website.category',compact('category'));

          }
              else{
                  return redirect()->route('homewebsite');
              }
          }

          public function contact(){

              return view('website.contact');

          }


          public function post($slug){

              $post=Post::with('category','user')->where('slug',$slug)->first();
              $posts=Post::with('category','user')->inRandomOrder()->limit(3)->get();
              $categories=Category::all();
              $tags=Tag::all();

              if($post || $posts ||$categories||tags){

                  return view('website.post',compact(['posts','post','categories','tags']));
              }
            else{

                return redirect('/');
            }

          }


          public function tag(){


              return view('website.tag');
          }
}

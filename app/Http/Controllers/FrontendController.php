<?php

namespace App\Http\Controllers;

use App\Post;
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

          public function category(){

              return view('website.category');

          }

          public function contact(){

              return view('website.contact');

          }


          public function post($slug){

              $post=Post::with('category','user')->where('slug',$slug)->first();
              if($post){

                  return view('website.post',compact('post'));
              }
            else{

                return redirect('/');
            }

          }


          public function tag(){


              return view('website.tag');
          }
}

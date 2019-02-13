<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class FrontController extends Controller
{
    public function index() {
      $posts = Post::paginate(5);
      $categories = Category::all();
      return view('frontend.index')->withPosts($posts)->withCategories($categories);
    }

    public function allCAtegory() {
      $categories  = Category::all();
      return view('frontend.allCAtegory')->withCategories($categories);
    }

    public function category($id) {
      $category = Category::find($id);
      return view('frontend.category')->withCategory($category);
    }
}

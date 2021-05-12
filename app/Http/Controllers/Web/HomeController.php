<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Product;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('home/index', compact('categories','products'));
    }

    public function category(Category $category)
    {
        // error_log('cek category');
        // error_log($category);
        
        $categories = Category::all();
        $products = $category->products()
                    // ->published()    
                    ->get();
        return view('home/index', compact('categories','products'));
    }
    
}
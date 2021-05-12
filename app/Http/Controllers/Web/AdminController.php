<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin/index');
    }

    public function product()
    {
        return view('admin/product');
    }

    public function category()
    {
        return view('admin/category');
    }

    public function login()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('login/index');
    }
}

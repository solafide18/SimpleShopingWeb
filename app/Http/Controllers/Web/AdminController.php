<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        // dd(Auth::check());
        if (Auth::check()) {
            return view('admin/index');
        }
        else{
            return redirect('/login');
        }
    }

    public function product()
    {
        if (Auth::check()) {
            return view('admin/product');
        }
        else{
            return redirect('/login');
        }
    }

    public function category()
    {
        if (Auth::check()) {
            return view('admin/category');
        }
        else{
            return redirect('/login');
        }
    }
}

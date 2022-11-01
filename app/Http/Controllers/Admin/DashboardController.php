<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Produk;

class DashboardController extends Controller
{
    public function index()
    {
       $Category = Category::all()->count();
       $Produk = Produk::all()->count();

        return view('admin.dashboard', compact('Category','Produk'));

    }
}

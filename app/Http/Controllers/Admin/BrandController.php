<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    public function index(Request $request){
        $brands = Brand::latest()->get();
        return view('admin.brand.index', compact('brands'));
    }

    public function create(Request $request){
        return view('admin.brand.create');
    }
}

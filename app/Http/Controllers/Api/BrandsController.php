<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BrandsController extends Controller
{
    public function index() {
        return Cache::remember('brands', 43200, function(){
            return Brand::all();
        });
    }
}

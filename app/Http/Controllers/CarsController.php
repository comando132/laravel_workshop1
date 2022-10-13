<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    public function index() {
        return view('cars.cars', [
            'title' => 'Cars',
            'cars' => Car::latest()->filter(request())->paginate(6)
        ]);

    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CarsController extends Controller
{
    public function index() {
        return Cache::remember('cars', 600, function () {
            return Car::all();
        });
    }

    public function show(Car $car) {
        return Cache::remember("car.{ $car->id }", 7200, function () use($car) {
            return $car;
        });

    }
}

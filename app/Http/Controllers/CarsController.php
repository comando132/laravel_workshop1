<?php

namespace App\Http\Controllers;

use App\Events\BrandCarsEvent;
use App\Models\Brand;
use App\Models\Car;
use App\Notifications\SendRegistrationEmail;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    public function index() {
        return view('cars.cars', [
            'title' => 'Cars',
            'edit' => false,
            'cars' => Car::latest()->paginate(6)
        ]);
    }
    public function manage() {
        return view('cars.cars', [
            'title' => 'Manage my Cars',
            'edit' => true,
            'cars' => Car::latest()->filter(['mycar' => true] )->paginate(9)
        ]);
    }

    public function create() {
        $brands = Brand::select('id', 'name')->get();
        return view('cars.car-create',[
                'title' => 'New car',
                'brands' => $brands
            ]
        );
    }

    public function edit(Car $car) {
        if ($car->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        dd(Car::countBrand());
        event(new BrandCarsEvent($car));

        $brands = Brand::select('id', 'name')->get();
        return view('cars.car-edit',[
                'title' => 'Car edition',
                'brands' => $brands,
                'car' => $car
            ]
        );
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => 'required',
            'brand_id' => 'required|exists:brands,id',
            'model' => 'required',
            'price' => 'required|numeric|between:100000,999999',
            'year' => 'required|numeric|between:1900,2023',
        ]);
        $formFields['user_id'] = auth()->id();
        $car = Car::create($formFields);
        // notificacion de carro creado
        $car->notify(new SendRegistrationEmail($car));
        return redirect('/cars/manage')->with('message', 'Car saved successfully.');
    }

    public function update(Request $request, Car $car) {
        if ($car->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'name' => 'required',
            'brand_id' => 'required|exists:brands,id',
            'model' => 'required',
            'price' => 'required|numeric|between:100000,999999',
            'year' => 'required|numeric|between:1900,2023',
        ]);

        $car->update($formFields);
        return redirect('/cars/manage')->with('message', 'Car updated successfully.');
    }

    public function destroy(Car $car) {
        if ($car->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        $car->delete();
        return redirect('/cars/manage')->with('message', 'Car deleted successfully.');
    }

}

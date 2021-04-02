<?php

namespace App\Http\Controllers\Cars;

use App\Http\Controllers\Controller;
use App\Models\Cars\Cars;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    public function index() {
        $data['title'] = 'Cars Page';
        $data['cars'] = Cars::all();

        return view('pages.cars.index', $data);
    }

    public function create() {
        $data = array(
            'title' => 'Cars Page',
            'formTitle' => 'Car Form - Create',
            'formUrl' => '/admin/cars/create',
            'data' => new Cars()
        );
        
        return view('pages.cars.form', $data);
    }

    public function store() {
        request()->validate([
            'name' => ['required'],
            'price' => ['required'],
            'qty' => ['required']
        ]);

        $car = Cars::query()->create(request()->only(['name', 'price', 'qty']));
        if(! $car) {
            return redirect('/admin/cars')->with('message', 'Failed to save data.');
        }

        return redirect('/admin/cars')->with('message', 'Data has been saved.');
    }

    public function edit($id) {
        $car = Cars::find($id);

        if(! $car) {
            return redirect('/admin/cars')->with('message', 'Data not found');
        }

        $data = array(
            'title' => 'Cars Page',
            'formTitle' => 'Car Form - Edit',
            'formUrl' => '/admin/cars/update/' . $id,
            'data' => $car
        );
        
        return view('pages.cars.form', $data);
    }

    public function update($id) {
        request()->validate([
            'name' => ['required'],
            'price' => ['required'],
            'qty' => ['required']
        ]);

        $car = Cars::query()
            ->where('id', $id)
            ->update(request()->only(['name', 'price', 'qty']));
        if(! $car) {
            return redirect('/admin/cars')->with('message', 'Failed to save data.');
        }

        return redirect('/admin/cars')->with('message', 'Data has been saved.');
    }

    public function delete($id) {
        $car = Cars::find($id);

        if(! $car) {
            return redirect('/admin/cars')->with('message', 'Data not found');
        }

        $deletedCar = $car->delete();
        if(! $deletedCar) {
            return redirect('/admin/cars')->with('message', 'Failed to delete data.');
        }

        return redirect('/admin/cars')->with('message', 'Data has been deleted.');   
    }
}

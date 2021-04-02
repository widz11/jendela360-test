<?php

namespace App\Http\Controllers\Cars;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    public function index() {
        $data['title'] = 'Cars Page';

        return view('pages.cars.index', $data);
    }
}

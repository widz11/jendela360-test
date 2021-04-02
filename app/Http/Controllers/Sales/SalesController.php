<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index() {
        $data['title'] = 'Sales Page';

        return view('pages.sales.index', $data);
    }
}

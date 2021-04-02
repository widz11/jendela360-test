<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Models\Cars\Cars;
use App\Models\Sales\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index() {
        $data['title'] = 'Sales Page';
        $data['sales'] = Sales::query()
            ->with('car')
            ->get();

        return view('pages.sales.index', $data);
    }

    public function create() {
        $data = array(
            'title' => 'Sales Page',
            'formTitle' => 'Sale Form - Create',
            'formUrl' => '/admin/sales/create',
            'data' => new Sales(),
            'cars' => Cars::all()
        );
        
        return view('pages.sales.form', $data);
    }

    public function store() {
        request()->validate([
            'car' => ['required'],
            'buyerName' => ['required'],
            'buyerEmail' => ['required', 'email'],
            'buyerPhoneNumber' => [],
            'date' => ['required']
        ]);

        // Create sales
        $sale = Sales::query()->create(array(
            'car_id' => request('car') ?? 0,
            'buyerName' => request('buyerName'),
            'buyerEmail' => request('buyerEmail'),
            'buyerPhoneNumber' => request('buyerPhoneNumber') ?? '',
            'date' => date('Y-m-d H:i:s', strtotime(request('date')))
        ));

        if(! $sale) {
            return redirect('/admin/sales')->with('message', 'Failed to save data.');
        }

        // Update stock car
        $car = Cars::find(request('car'));
        if($car) {
            $car->qty -= 1;
            $car->save();
        }

        return redirect('/admin/sales')->with('message', 'Data has been saved.');
    }

    public function edit($id) {
        $sale = Sales::find($id);

        if(! $sale) {
            return redirect('/admin/sales')->with('message', 'Data not found');
        }

        $data = array(
            'title' => 'Sales Page',
            'formTitle' => 'Car Form - Edit',
            'formUrl' => '/admin/sales/update/' . $id,
            'data' => $sale,
            'cars' => Cars::all()
        );
        
        return view('pages.sales.form', $data);
    }

    public function update($id) {
        request()->validate([
            'car' => ['required'],
            'buyerName' => ['required'],
            'buyerEmail' => ['required', 'email'],
            'buyerPhoneNumber' => [],
            'date' => ['required']
        ]);

        $saleExist = Sales::find($id)->load('car');
        if($saleExist->car->id != request('car')) {
            // Update stock car when different car before
            $car = Cars::find($saleExist->car->id);
            if($car) {
                $car->qty += 1;
                $car->save();
            }
        }

        $sale = Sales::query()
            ->where('id', $id)
            ->update(array(
                'car_id' => request('car') ?? 0,
                'buyerName' => request('buyerName'),
                'buyerEmail' => request('buyerEmail'),
                'buyerPhoneNumber' => request('buyerPhoneNumber') ?? '',
                'date' => date('Y-m-d H:i:s', strtotime(request('date')))
            ));

        if(! $sale) {
            return redirect('/admin/sales')->with('message', 'Failed to save data.');
        }

        // Update stock car
        $car = Cars::find(request('car'));
        if($car) {
            $car->qty -= 1;
            $car->save();
        }

        return redirect('/admin/sales')->with('message', 'Data has been saved.');
    }

    public function delete($id) {
        $sale = Sales::find($id);

        if(! $sale) {
            return redirect('/admin/sales')->with('message', 'Data not found');
        }
        
        // Update stock car when different car before
        $car = Cars::find($sale->car->id);
        if($car) {
            $car->qty += 1;
            $car->save();
        }

        $deletedData = $sale->delete();
        if(! $deletedData) {
            return redirect('/admin/sales')->with('message', 'Failed to delete data.');
        }

        return redirect('/admin/sales')->with('message', 'Data has been deleted.');   
    }
}

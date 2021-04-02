<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Models\Cars\Cars;
use App\Models\Sales\Sales;
use Illuminate\Http\Request;

class ReportSalesController extends Controller
{
    public function todayReport() {
        $startDate = date('Y-m-d H:i:s');
        $endDate = date('Y-m-d H:i:s');
        
        $data = array(
            'mostSoldCar' => $this->mostSoldCar($startDate, $endDate),
            'totalQuantitySales' => $this->totalQuantitySales($startDate, $endDate),
            'totalSales' => $this->totalSales($startDate, $endDate) 
        );

        return view('pages.sales.report', $data);
    }

    protected function mostSoldCar($startDate, $endDate) {
        $startDate = date('Y-m-d 00:00:00', strtotime($startDate));
        $endDate = date('Y-m-d 23:59:59', strtotime($endDate));

        $result = null;
        $cars = Cars::query()
            ->with('sales')
            ->whereHas('sales', function($query) use($startDate, $endDate) {
                return $query->where('date', '>=', $startDate)
                    ->where('date', '<=', $endDate);
            })
            ->withCount('sales')
            ->get();

        if($cars) {
            $counter = 0;
            $temp = 0;
            foreach($cars as $car) {
                if($counter == 0) {
                    $temp = $car->sales_count;
                    $result = $car;
                    $counter++;
                } elseif($temp < $car->sales_count) {
                    $temp = $car->sales_count;
                    $result = $car;
                }
            }
        }
        
        return $result->name;
    }

    protected function totalQuantitySales($startDate, $endDate) {
        $startDate = date('Y-m-d 00:00:00', strtotime($startDate));
        $endDate = date('Y-m-d 23:59:59', strtotime($endDate));

        $result = Sales::query()
            ->where('date', '>=', $startDate)
            ->where('date', '<=', $endDate)
            ->count();
        
        return $result;
    }

    protected function totalSales($startDate, $endDate) {
        $startDate = date('Y-m-d 00:00:00', strtotime($startDate));
        $endDate = date('Y-m-d 23:59:59', strtotime($endDate));
        
        $result = 0;
        $sales = Sales::query()
            ->with('car')
            ->where('date', '>=', $startDate)
            ->where('date', '<=', $endDate)
            ->get();

        if($sales) {
            foreach($sales as $sale) {
                $result += $sale->car->price;
            }
        }
        
        
        return $result;
    }
}

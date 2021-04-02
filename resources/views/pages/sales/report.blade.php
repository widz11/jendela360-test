@extends('layout.admin')

@section('content')
    <h3>Report</h3>
    <table border="1">
        <tbody>
            <tr>
                <td colspan="2">Today Report</td>
            </tr>
            <tr>
                <td>Most Sold Cars</td>
                <td>{{ $mostSoldCar }}</td>
            </tr>
            <tr>
                <td>Sales Today</td>
                <td>{{ $totalQuantitySales }}</td>
            </tr>
            <tr>
                <td>Total Sales Today</td>
                <td>{{ $totalSales }}</td>
            </tr>
        </tbody>
    </table>
@endsection
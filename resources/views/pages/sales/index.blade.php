@extends('layout.admin')

@section('content')
    <h3>Sale List</h3>
    <table>
        <tr>
            <td>Action: </td>
            <td><a href="/admin/sales/create">Create Sale</a></td>
            <td>|</td>
            <td><a href="/admin/sales/report">Report</a></td>
        </tr>
    </table>
    <br>
    <table border="1">
        <thead>
            <th>Buyer Name</th>
            <th>Buyer Email</th>
            <th>Buyer Phone Number</th>
            <th>Car</th>
            <th>Sale</th>
            <th>Date</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @if(sizeof($sales) > 0)
                @foreach($sales as $sale)
                <tr>
                    <td>{{ $sale->buyerName }}</td>
                    <td>{{ $sale->buyerEmail }}</td>
                    <td>{{ $sale->buyerPhoneNumber }}</td>
                    <td>{{ $sale->car ? $sale->car->name : '' }}</td>
                    <td>{{ $sale->car ? $sale->car->price : '' }}</td>
                    <td>{{ date('Y-m-d', strtotime($sale->date)) }}</td>
                    <td>
                        <a href="/admin/sales/edit/{{$sale->id}}">Edit</a> | 
                        <a href="/admin/sales/delete/{{$sale->id}}">Delete</a>
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6">None</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
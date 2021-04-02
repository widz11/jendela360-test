@extends('layout.admin')

@section('content')
    <h3>Car List</h3>
    <table>
        <tr>
            <td>Action: </td>
            <td><a href="/admin/cars/create">Create Car</a></td>
        </tr>
    </table>
    <br>
    <table border="1">
        <thead>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @if(sizeof($cars) > 0)
                @foreach($cars as $car)
                <tr>
                    <td>{{ $car->name }}</td>
                    <td>{{ $car->price }}</td>
                    <td>{{ $car->qty }}</td>
                    <td>
                        <a href="/admin/cars/edit/{{$car->id}}">Edit</a> | 
                        <a href="/admin/cars/delete/{{$car->id}}">Delete</a>
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4">None</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
@extends('layout.form')

@section('content-form')
    <table>
        <tr></tr>
        <tr>
            <td><label for="name">Name:</label></td>
            <td><input type="text" name="name" placeholder="Car name" value="{{ old('name', $data->name) }}" required></td>
            <td>
                @error('name')
                    <span style="color:red;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </td>
        </tr>
        <tr>
            <td><label for="price">Price:</label></td>
            <td><input type="number" min="0" name="price" placeholder="Car price" value="{{ old('price', $data->price) }}" required></td>
            <td>
                @error('price')
                    <span style="color:red;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </td>
        </tr>
        <tr>
            <td><label for="quantity">Quantity:</label></td>
            <td><input type="number" min="0" name="qty" placeholder="Car quantity" value="{{ old('qty', $data->price) }}" required></td>
            <td>
                @error('qty')
                    <span style="color:red;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </td>
        </tr>
    </table>
@endsection
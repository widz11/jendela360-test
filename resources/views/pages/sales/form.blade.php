@extends('layout.form')

@section('content-form')
    <table>
        <tr></tr>
        <tr>
            <td><label for="date">Date:</label></td>
            <td><input type="date" name="date" placeholder="Sale date" value="{{ old('date', isset($data->date) ? date('Y-m-d', strtotime($data->date)) : date('Y-m-d') ) }}" required></td>
            <td>
                @error('date')
                    <span style="color:red;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </td>
        </tr>
        <tr>
            <td><label for="buyerName">Buyer Name:</label></td>
            <td><input type="text" name="buyerName" placeholder="Buyer name" value="{{ old('buyerName', $data->buyerName) }}" required></td>
            <td>
                @error('buyerName')
                    <span style="color:red;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </td>
        </tr>
        <tr>
            <td><label for="buyerEmail">Buyer Email:</label></td>
            <td><input type="email" name="buyerEmail" placeholder="Buyer email" value="{{ old('buyerEmail', $data->buyerEmail) }}" required></td>
            <td>
                @error('buyerEmail')
                    <span style="color:red;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </td>
        </tr>
        <tr>
            <td><label for="buyerPhoneNumber">Buyer Phone Number:</label></td>
            <td><input type="text" name="buyerPhoneNumber" placeholder="Buyer phone number" value="{{ old('buyerPhoneNumber', $data->buyerPhoneNumber) }}"></td>
            <td>
                @error('buyerPhoneNumber')
                    <span style="color:red;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </td>
        </tr>
        <tr>
            <td><label for="car">Car:</label></td>
            <td>
                <select name="car" id="car" required>
                    <option value="">Please select car</option>
                    @foreach($cars as $car)
                    <option value="{{ $car->id }}" 
                        {{ old('car', $data->car_id) == $car->id ? 'selected' : '' }}
                    >
                        {{ $car->name }}
                    </option>
                    @endforeach
                </select>
            </td>
            <td>
                @error('car')
                    <span style="color:red;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </td>
        </tr>
    </table>
@endsection
<p>
    Dear {{$sale->buyerName}},
    <br>
    <br>
    This is your invoice.
</p>
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
    </tbody>
</table>
<p>
    Thank you
</p>
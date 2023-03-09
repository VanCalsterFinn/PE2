@extends('invoices.layouts')

@section('content')

<div class="flex flex-col justify-content content-center w-max h-max">
    <div class="flex">
        <table>
            <tr>
                <th>Invoice ID</th>
                <th>Customer ID</th>
                <th>Freight</th>
                <th>Price</th>
                <th>Status</th>
                <th>Due Date</th>
            </tr>
            @foreach ($invoices as $invoice_item)
            <tr>
                <td>{{ $invoice_item->id }}</td>
                <td>{{ $invoice_item->customer_id }}</td>
                <td>{{ $invoice_item->freight }}</td>
                <td>{{ $invoice_item->total_price }}</td>
                <td>{{ $invoice_item->is_paid }}</td>
                <td>{{ $invoice_item->due_date }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection
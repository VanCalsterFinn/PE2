@extends('layouts.app')

@section('content')

<div class="flex flex-col justify-content content-center w-max">
    <div class="flex justify-center content-center py-4">
        <h1 class="font-semibold text-2xl">Invoices</h1>
    </div>
    <a href="{{ route('create') }}" class="bg-blue-700 p-1 rounded-lg text-white w-24 flex justify-center items-center">New</a>
    <div class="flex">
        <table class="flex border-grey border-2 p-4 rounded-lg mt-4">
            <tr class="flex gap-6">
                <th>Invoice ID</th>
                <th>Create Date</th>
                <th>Freight</th>
                <th>Price</th>
                <th>Status</th>
                <th>Due Date</th>
            </tr>
            {{-- Loading in invoices from the database --}}
            <tr class="flex gap-6">
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </table>
    </div>
</div>

@endsection
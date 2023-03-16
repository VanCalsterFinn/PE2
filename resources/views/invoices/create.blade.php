@extends('layouts.app')

@section('content')
    <div class="flex justify-center content-center font-mono">
        <form action="{{ route('create') }}" method="post">
            @csrf
            <div class="flex flex-col justify-content content-center ">
                <!-- Title -->
                <div class="flex justify-center content-center py-4">
                    <h1 class="font-semibold text-2xl">New Invoice</h1>
                </div>
                <!-- Customer Selection Block -->
                {{-- <div class="flex flex-col py-2">
                <h1 class="font-semibold text-lg">Customer</h1>
                <input type="text" name="customer_id" class="form-control border-grey border-2 rounded w-60">
            </div> --}}

                <!-- Address Selection Block -->
                <div class="flex gap-16 py-2">
                    {{-- <div class="flex-col">
                <h1 class="font-semibold text-lg">From</h1>
                <div class="flex flex-col">
                    <label for="country">Country</label>
                    <input type="text" name="country" class="border-grey border-2 rounded">
                </div>
                <div class="flex flex-col">
                    <label for="city">City</label>
                    <input type="text" name="city" class="border-grey border-2 rounded">
                </div>
                <div class="flex flex-col">
                    <label for="zip">Zip</label>
                    <input type="text" name="zip" class="border-grey border-2 rounded">
                </div>
                <div class="flex flex-col">                
                    <label for="street">Street</label>
                    <input type="text" name="street" class="border-grey border-2 rounded">
                </div>
            </div> --}}

                    <div class="flex-col py-4">
                        <h1 class="font-semibold text-lg">Shipping Address</h1>
                        <div class="flex flex-col">
                            <label for="to_country">Country</label>
                            <input type="text" name="to_country" class="form-control border-grey border-2 rounded">
                        </div>
                        <div class="flex flex-col">
                            <label for="to_city">City</label>
                            <input type="text" name="to_city" class="form-control border-grey border-2 rounded">
                        </div>
                        <div class="flex flex-col">
                            <label for="to_zip">Zip</label>
                            <input type="text" name="to_zip" class="form-control border-grey border-2 rounded">
                        </div>
                        <div class="flex flex-col">
                            <label for="to_street">Street</label>
                            <input type="text" name="to_street" class="form-control border-grey border-2 rounded">
                        </div>
                    </div>
                </div>

                <!-- Invoice Date Block -->
                {{-- <div class="flex justify-between content-center p-4 border-2 border-grey rounded-lg">
                <div class="flex flex-col pr-8">
                    <h1 class="font-semibold text-lg">Invoice Date</h1>
                    <input type="date" name="invoice_date" id="datePicker" class="form-control border-grey border-2 rounded">
                </div>
                <div class="flex flex-col">
                    <h1 class="font-semibold text-lg">Due Date</h1>
                    <select name="due_date" id="" class="form-control border-grey border-2 rounded">
                        <option value="30">After 30 days</option>
                        <option value="40">After 40 days</option>
                        <option value="50">After 50 days</option>
                        <option value="60">After 60 days</option>
                    </select>
                </div>
            </div> --}}

                <!-- Order ID Block -->
                {{-- <div class="flex justify-content content-align gap-16 py-2">
                <div class="flex flex-col">
                    <h1 class="font-semibold text-lg">Order Number</h1>
                    <input type="text" name="order_id" class="form-control border-grey border-2 rounded">
                </div>
            </div> --}}


                <!-- Freight Block -->
                <div class="flex justify-content content-align gap-16 py-2">
                    <div class="flex flex-col">
                        <h1 class="font-semibold text-lg">Freight</h1>
                        <div class="flex border-grey border-2 p-4 rounded-lg">
                            <div class="flex flex-col">
                                <div class="flex flex-col justify-content content-align">
                                    <!-- Add Item Button -->
                                    <button class="flex justify-center content-center bg-blue-700 text-white rounded w-24"
                                        type="button" name="add" id="add">Add
                                        item</button>
                                    <div class="flex gap-8 py-2">
                                        <table class="w-max"id="table">
                                            <tr class="flex justify-between items-center gap-6">
                                                <th class="flex flex-start w-48">Description</th>
                                                <th class="flex flex-start w-16">Length</th>
                                                <th class="flex flex-start w-16">Width</th>
                                                <th class="flex flex-start w-16">Height</th>
                                                <th class="flex flex-start w-16">Weight</th>
                                                <th class="flex flex-start w-16">Action</th>
                                            </tr>
                                            <!-- Block for spawning in extra freight items -->
                                            <tr class="flex justify-between items-center">
                                                <td class="flex flex-start w-48"><input type="text"
                                                        name="inputs[0][description]"
                                                        class="border-grey border-2 rounded w-30 form-control"
                                                        placeholder="Item description"></td>
                                                <td class="flex flex-start w-16"><input type="text"
                                                        name="inputs[0][length]"
                                                        class="border-grey border-2 rounded w-full form-control"
                                                        placeholder="in cm"></td>
                                                <td class="flex flex-start w-16"><input type="text"
                                                        name="inputs[0][width]"
                                                        class="border-grey border-2 rounded w-full form-control"
                                                        placeholder="in cm"></td>
                                                <td class="flex flex-start w-16"><input type="text"
                                                        name="inputs[0][height]"
                                                        class="border-grey border-2 rounded w-full form-control"
                                                        placeholder="in cm"></td>
                                                <td class="flex flex-start w-16"><input type="text"
                                                        name="inputs[0][weight]"
                                                        class="border-grey border-2 rounded w-full form-control"
                                                        placeholder="in kg"></td>
                                                <td class="flex flex-start w-16 justify-center items-center"><button
                                                        type="button"
                                                        class="bg-neutral-500 rounded-full text-white w-6 h-6 hidden">X</button>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Price & Calculations -->
                {{-- <div class="flex flex-col justify-center content-end w-2/3">
                    <div class="flex flex-col border-b-2 border-blue-700 py-2">
                        <div class="flex justify-between pr-4">
                            <h1>Subtotal</h1>
                            <p>$0.0</p>
                        </div>
                        <div class="flex justify-between pr-4">
                            <h1>Discount</h1>
                            <p>-$0.0</p>
                        </div>
                        <div class="flex justify-between pr-4">
                            <h1>Tax</h1>
                            <p>-$0.0</p>
                        </div>
                    </div>
                    <div class="flex flex-col border-b-2 border-blue-700 py-2">
                        <div class="flex justify-between pr-4">
                            <h1>Total</h1>
                            <p>$0.0</p>
                        </div>
                        <div class="flex justify-between pr-4">
                            <h1>Deposit Requested</h1>
                            <p>$0.0</p>
                        </div>
                    </div>
                    <div class="flex flex-col py-2">
                        <div class="flex justify-between pr-4">
                            <h1>Deposit Due</h1>
                            <p>$0.0</p>
                        </div>
                    </div>
                </div> --}}

                <!-- Save Button -->
                <div class="flex justify-start content-center py-4">
                    <button type="submit" class="bg-blue-700 rounded w-48 h-8 text-white">Save</button>
                </div>

            </div>
        </form>

    </div>
@endsection

@extends('invoices.layout')

@section('content')
    <div class="flex justify-center content-center font-mono">
        <form action="{{ route('invoices.store') }}" method="POST">
            @csrf
        <div class="flex flex-col justify-content content-center ">
            <!-- Title -->
            <div class="flex justify-center content-center py-4">
                <h1 class="font-semibold text-2xl">New Invoice</h1>
            </div>
            <!-- Customer Selection Block -->
            <div class="flex flex-col py-2">
                <h1 class="font-semibold text-lg">Customer</h1>
                <input type="text" name="customer_id" class="form-control border-grey border-2 rounded w-60">
            </div>

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

                <div class="flex-col">
                    <h1 class="font-semibold text-lg">Shipping Address</h1>
                    <div class="flex flex-col">
                        <label for="country">Country</label>
                        <input type="text" name="country" class="form-control border-grey border-2 rounded">
                    </div>
                    <div class="flex flex-col">
                        <label for="city">City</label>
                        <input type="text" name="city" class="form-control border-grey border-2 rounded">
                    </div>
                    <div class="flex flex-col">
                        <label for="zip">Zip</label>
                        <input type="text" name="zip" class="form-control border-grey border-2 rounded">
                    </div>
                    <div class="flex flex-col">
                        <label for="street">Street</label>
                        <input type="text" name="street" class="form-control border-grey border-2 rounded">
                    </div>
                </div>
            </div>

            <!-- Invoice Date Block -->
            <div class="flex justify-between content-center p-4 border-2 border-grey rounded-lg">
                <div class="flex flex-col pr-8">
                    <h1 class="font-semibold text-lg">Invoice Date</h1>
                    <input type="date" name="invoice_date" id="datePicker" class="form-control border-grey border-2 rounded">
                </div>
                <div class="flex flex-col">
                    <h1 class="font-semibold text-lg">Invoice Due</h1>
                    <select name="due_date" id="" class="form-control border-grey border-2 rounded">
                        <option value="30">After 30 days</option>
                        <option value="40">After 40 days</option>
                        <option value="50">After 50 days</option>
                        <option value="60">After 60 days</option>
                    </select>
                </div>
            </div>

            <!-- Order ID Block -->
            <div class="flex justify-content content-align gap-16 py-2">
                <div class="flex flex-col">
                    <h1 class="font-semibold text-lg">Purchase Order Number</h1>
                    <input type="text" name="order_id" class="form-control border-grey border-2 rounded">
                </div>
            </div>


            <!-- Freight Block -->
            <div class="flex justify-content content-align gap-16 py-2">
                <div class="flex flex-col">
                    <h1 class="font-semibold text-lg">Freight</h1>
                    <div class="flex border-grey border-2 p-4 rounded-lg">
                        <div class="flex flex-col">
                            <div class="flex flex-col justify-content content-align">
                                <!-- Add Item Button -->
                                <button class="flex justify-center content-center bg-blue-700 text-white rounded w-24">Add
                                    item</button>
                                <div class="flex gap-8 py-2">
                                    <div class="flex flex-col">
                                        <label for="description">
                                            <h1>Description</h1>
                                        </label>
                                        <input type="text" name="description" class="form-control border-grey border-2 rounded">
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="length">
                                            <h1>Length</h1>
                                        </label>
                                        <input type="text" name="length" class="form-control border-grey border-2 rounded w-16">
                                    </div>

                                    <div class="flex flex-col">
                                        <label for="width">
                                            <h1>Width</h1>
                                        </label>
                                        <input type="text" name="width" class="form-control border-grey border-2 rounded w-16">
                                    </div>

                                    <div class="flex flex-col">
                                        <label for="height">
                                            <h1>Heigth</h1>
                                        </label>
                                        <input type="text" name="height" class="form-control border-grey border-2 rounded w-16">
                                    </div>

                                    <div class="flex flex-col">
                                        <label for="Quantity">
                                            <h1>Quantity</h1>
                                        </label>
                                        <input type="number" min="1" value="1" name="quantity"
                                            class="form-control border-grey border-2 rounded w-16">
                                    </div>
                                </div>
                                <!-- Block for spawning in extra freight items -->
                                <div class="flex">
                                    <div class="flex justify-content content-align gap-8 py-2">
                                        <input type="text" name="description" class="border-grey border-2 rounded">
                                        <input type="text" name="length" class="border-grey border-2 rounded w-16">
                                        <input type="text" name="width" class="border-grey border-2 rounded w-16">
                                        <input type="text" name="height" class="border-grey border-2 rounded w-16">
                                        <input type="number" min="1" value="1" name="Quantity"
                                            class="border-grey border-2 rounded w-16">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Price & Calculations -->
            <div class="flex flex-col justify-center content-end w-2/3">
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
            </div>

            <!-- Save Button -->
            <div class="flex justify-start content-center py-4">
                <button type="submit" class="bg-blue-700 rounded w-48 h-8 text-white">Save</button>
            </div>

        </div>
        </form>

    </div>
    
@endsection

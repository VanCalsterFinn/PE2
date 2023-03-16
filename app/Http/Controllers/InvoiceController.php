<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('invoices.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('invoices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'to_country' => 'required',
            'to_city' => 'required',
            'to_zip' => 'required',
            'to_street' => 'required',
            'inputs.*.description' => 'required',
            'inputs.*.length' => 'required',
            'inputs.*.width' => 'required',
            'inputs.*.height' => 'required',
            'inputs.*.weight' => 'required',
        ]);

        //Here i need to calculate the freight and generate an invoice with its child invoice items linked through the invoice id
        //The formula will be volumetric weight times quantity -> ((length + width + height) / 5000) * quantity
        /* Temp Declarations */
        $vol_freight_tarrif = 5;
        $dense_cargo_tarrif = 4;
        $VAT_percentage = 0.21;
        $volumetric_freight = 0;
        $total_weight = 0;
        $total_price = 0;
        $freight = 0;
        foreach ($request->inputs as $input) {
            $item_length = $input['length'];
            $item_width = $input['width'];
            $item_height = $input['height'];
            $volumetric_freight += (($item_length * $item_width * $item_height) / 5000);
            $total_weight += $input['weight'];
        }
        if ($volumetric_freight > $total_weight) {
            //Volumetric air freight rates
            $freight = $volumetric_freight;
            $total_price = $volumetric_freight * $vol_freight_tarrif;
            $total_price_excl_VAT = $total_price / (1 + $VAT_percentage);
        } else {
            //Dense cargo tarrif
            $freight = $total_weight;
            $total_price = $total_weight * $dense_cargo_tarrif;
            $total_price_excl_VAT = $total_price / (1 + $VAT_percentage);
        }
        //First we create the invoice se we can link all the invoice items to that invoice
        $invoice = Invoice::create([
            'user_id' => auth()->user()->id,
            'freight' => $freight,
            'to_country' => $request['to_country'],
            'to_city' => $request['to_city'],
            'to_zip' => $request['to_zip'],
            'to_street' => $request['to_street'],
            'total_price' => $total_price,
            'total_price_excl_vat' => $total_price_excl_VAT,
        ]);

        //Get the last inserted id
        foreach ($request->inputs as $input) {
            InvoiceItem::create([
                'invoice_id' => $invoice->id,
                'description' => $input['description'],
                'length' => $input['length'],
                'width' => $input['width'],
                'height' => $input['height'],
                'weight' => $input['weight'], 
            ]);
        }

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}

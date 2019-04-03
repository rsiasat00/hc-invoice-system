<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Product;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Requests\InvoiceRequest;
use App\Http\Requests\InvoiceRequestUpdate;
use Auth;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Invoice $model)
    {
        return view('invoices.index', ['invoices' => $model->orderBy('id', 'DESC')->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('invoices.create', ['products' => Product::orderBy('name', 'ASC')->get(), 'orders' => collect(new Order)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvoiceRequest $request, Invoice $model)
    {
        $invoice = $model->create($request->merge(['customer_id' => Auth::user()->id])->all());
        $this->createOrUpdatePurchaseLineItems($request, $invoice);
        $this->createOrUpdatePaymentLineItems($request, $invoice);
        return redirect()->route('invoice.index')->withStatus(__('Invoice successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        return view('invoices.show', ['invoice' => $invoice, 'products' => Product::orderBy('name', 'ASC')->get(), 'orders' => Order::where('invoice_id', $invoice->id)->orderBy('created_at', 'ASC')->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        return view('invoices.edit', ['invoice' => $invoice, 'products' => Product::orderBy('name', 'ASC')->get(), 'orders' => Order::where('invoice_id', $invoice->id)->orderBy('created_at', 'ASC')->get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InvoiceRequestUpdate $request, Invoice $invoice)
    {
        $invoice->update($request->merge(['customer_id' => Auth::user()->id])->all());
        $this->createOrUpdatePurchaseLineItems($request, $invoice);
        $this->createOrUpdatePaymentLineItems($request, $invoice);
        return redirect()->route('invoice.index')->withStatus(__('Invoice successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        return redirect()->route('invoice.index')->withStatus(__('Invoice successfully deleted.'));
    }

    public function createOrUpdatePurchaseLineItems($request, $invoice) {

        $productPurchaseSelect = $request->productPurchaseSelect;
        $productPurchaseCtr = count($request->productPurchaseSelect);
        
        $productPrice = $request->productPrice;
        $productTax = $request->productTax;
        $productQuantity = $request->productQuantity;
        
        $oldOrders = Order::where('invoice_id', $invoice->id)->get();
        for ($i=0; $i < count($oldOrders); $i++) { 
            $oldOrders[$i]->delete();
        }

        for ($x = 0; $x < $productPurchaseCtr; $x++) {
            
            $newOrder = new Order();
            $newOrder->invoice_id = $invoice->id;
            $newOrder->product_id = $productPurchaseSelect[$x];
            $newOrder->price = $productPrice[$x];
            $newOrder->tax = $productTax[$x];
            $newOrder->quantity = $productQuantity[$x];
            $newOrder->order_date = $invoice->created_at;
            $newOrder->save();

        }

        return true;
    }

    public function createOrUpdatePaymentLineItems($request, $invoice) {
        $productPaymentSelect = $request->productPaymentSelect;
        $productPaymentCtr = count($request->productPaymentSelect);
        
        for ($x = 0; $x < $productPaymentCtr; $x++) {

        }

        return true;
    }
}

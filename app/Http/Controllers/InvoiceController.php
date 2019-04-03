<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Product;
use App\PurchaseLineItem;
use App\PaymentLineItem;
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
        return view('invoices.create',
            [
                'products' => Product::orderBy('name', 'ASC')->get(),
                'purchaseLineItems' => collect(new PurchaseLineItem),
                'paymentLineItems' => collect(new PaymentLineItem)
            ]
        );
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
        $purchaseLineItems = PurchaseLineItem::where('invoice_id', $invoice->id)->orderBy('created_at', 'ASC')->get();
        $paymentLineItems = PaymentLineItem::where('invoice_id', $invoice->id)->orderBy('created_at', 'ASC')->get();
        $paymentLineItemsTotal = 0;
        $purchaseLineItemsTotal = 0;
        
        foreach ($purchaseLineItems as $key => $value) {
            $purchaseLineItemsTotal += ($value->price + $value->tax) * $value->quantity;
        }

        foreach ($paymentLineItems as $key => $value) {
            $paymentLineItemsTotal += $value->amount;
        }

        $purchaseLineItemsTotal = number_format($purchaseLineItemsTotal, 2);
        $paymentLineItemsTotal = number_format($paymentLineItemsTotal, 2);
        $overallTotal = number_format($purchaseLineItemsTotal + $paymentLineItemsTotal, 2);

        return view('invoices.show', 
            [
                'invoice' => $invoice,
                'products' => Product::orderBy('name', 'ASC')->get(),
                'purchaseLineItems' => $purchaseLineItems,
                'paymentLineItems' => $paymentLineItems,
                'purchaseLineItemsTotal' => $purchaseLineItemsTotal,
                'paymentLineItemsTotal' => $paymentLineItemsTotal,
                'overallTotal' => $overallTotal,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        return view('invoices.edit',
            [
                'invoice' => $invoice,
                'products' => Product::orderBy('name', 'ASC')->get(),
                'purchaseLineItems' => PurchaseLineItem::where('invoice_id', $invoice->id)->orderBy('created_at', 'ASC')->get(),
                'paymentLineItems' => PaymentLineItem::where('invoice_id', $invoice->id)->orderBy('created_at', 'ASC')->get()
            ]
        );
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
        
        $oldPurchaseLineItems = PurchaseLineItem::where('invoice_id', $invoice->id)->get();
        for ($i=0; $i < count($oldPurchaseLineItems); $i++) { 
            $oldPurchaseLineItems[$i]->delete();
        }

        for ($x = 0; $x < $productPurchaseCtr; $x++) {
            
            $newPurchaseLineItem = new PurchaseLineItem();
            $newPurchaseLineItem->invoice_id = $invoice->id;
            $newPurchaseLineItem->product_id = $productPurchaseSelect[$x];
            $newPurchaseLineItem->price = $productPrice[$x];
            $newPurchaseLineItem->tax = $productTax[$x];
            $newPurchaseLineItem->quantity = $productQuantity[$x];
            $newPurchaseLineItem->save();

        }

        return true;
    }

    public function createOrUpdatePaymentLineItems($request, $invoice) {
        $productPaymentSelect = $request->productPaymentSelect;
        $productPaymentCtr = count($request->productPaymentSelect);
        
        $oldPaymentLineItems = PaymentLineItem::where('invoice_id', $invoice->id)->get();
        for ($i=0; $i < count($oldPaymentLineItems); $i++) { 
            $oldPaymentLineItems[$i]->delete();
        }

        $productAmount = $request->productAmount;
        for ($x = 0; $x < $productPaymentCtr; $x++) {
            $newPaymentLineItem = new PaymentLineItem();
            $newPaymentLineItem->invoice_id = $invoice->id;
            $newPaymentLineItem->payment_type = $productPaymentSelect[$x];
            $newPaymentLineItem->amount = $productAmount[$x];
            $newPaymentLineItem->save();
        }

        return true;
    }
}

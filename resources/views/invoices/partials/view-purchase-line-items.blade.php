<h6 class="heading-small text-muted mb-4">{{ __('Purchase Line Items Information') }}</h6>
<div class="pl-lg-4">
    <div class="table-responsive">
        <table class="table align-items-center">
            <thead class="thead-light">
            <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Tax</th>
                <th scope="col">Quantity</th>
            </tr>
            </thead>
            <tbody>
                @if(!$purchaseLineItems->isEmpty())
                    @foreach ($purchaseLineItems as $purchaseLineItem)
                        <tr>
                            <td>
                                @foreach ($products as $product)
                                    @if($product->id == $purchaseLineItem->product->id )
                                        <div class="form-group">
                                            <span class="form-control form-control-alternative">{{ $product->name }}</span>
                                        </div>
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                <div class="form-group">
                                    <span class="form-control form-control-alternative">{{ $purchaseLineItem->price }}</span>
                                </div>
                            </td>
                            
                            <td>
                                <div class="form-group">
                                    <span class="form-control form-control-alternative">{{ $purchaseLineItem->tax }}</span>
                                </div>
                            </td>
                            
                            <td>
                                <div class="form-group">
                                    <span class="form-control form-control-alternative">{{ $purchaseLineItem->quantity }}</span>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <div class="form-group">
        <label class="form-control-label" for="input-purchase-line-total">{{ __('Purchase Line Total') }}</label>
    <span class="form-control form-control-alternative">{{ $purchaseLineItemsTotal }}</span>
    </div>
</div>
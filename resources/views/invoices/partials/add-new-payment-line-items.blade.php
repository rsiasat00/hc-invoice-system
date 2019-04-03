<div class="d-flex justify-content-between align-items-center mb-4 mt-4">
    <h6 class="heading-small text-muted pt-3" >{{ __('Add New Payment Line Items') }}</h6>

    <button type="button" class="btn btn-outline-primary btn-add-payment-line-item">Add Payment Line Item</button>
</div>


<div class="pl-lg-4 mb-4">
    <div class="table-responsive">
      <table class="table align-items-center">
        <thead class="thead-light">
          <tr>
            <th scope="col">Payment Type</th>
            <th scope="col">Amount</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @if($paymentLineItems->isEmpty())
            <tr>
              <td>
                  <select class="custom-select product-payment-select" name="productPaymentSelect[]" id="product-payment-select-1">
                    <option value="Cash" selected>Cash</option>
                    <option value="Check">Check</option>
                    <option value="Credit">Credit</option>
                  </select>
              </td>
              <td>
                  <input type="number" step=".01" name="productAmount[]" id="input-product-amount-1" class="form-control form-control-alternative product-amount" placeholder="Amount" value="" required>
              </td>
              
              <td>
                  <button type="button" class="btn btn-outline-danger btn-block btn-remove-payment-line-item">Remove</button>
              </td>
            </tr>
          @else
            @foreach ($paymentLineItems as $paymentLineItem)
              <tr>
                <td>
                    <select class="custom-select product-payment-select" name="productPaymentSelect[]" id="product-payment-select-1">
                      <option value="Cash" {{ $paymentLineItem->payment_type == 'Cash' ? 'selected' : '' }}>Cash</option>
                      <option value="Check" {{ $paymentLineItem->payment_type == 'Check' ? 'selected' : '' }}>Check</option>
                      <option value="Credit" {{ $paymentLineItem->payment_type == 'Credit' ? 'selected' : '' }}>Credit</option>
                    </select>
                </td>
                <td>
                <input type="number" step=".01" name="productAmount[]" id="input-product-amount-1" class="form-control form-control-alternative product-amount" placeholder="Amount" value="{{ $paymentLineItem->amount }}" required>
                </td>
                
                <td>
                    <button type="button" class="btn btn-outline-danger btn-block btn-remove-payment-line-item">Remove</button>
                </td>
              </tr>
            @endforeach
          @endif
          
        </tbody>
      </table>
  
  </div>
</div>
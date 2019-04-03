<div class="d-flex justify-content-between align-items-center mb-4">
    <h6 class="heading-small text-muted pt-3" >{{ __('Add New Purchase Line Items') }}</h6>

    <button type="button" class="btn btn-primary btn-add-purchase-line-item">Add Purchase Line Item</button>
</div>


<div class="pl-lg-4 mb-4">
    <div class="table-responsive">
      <table class="table align-items-center">
        <thead class="thead-light">
          <tr>
            <th scope="col">Product</th>
            <th scope="col">Price</th>
            <th scope="col">Tax</th>
            <th scope="col">Quantity</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          
        @if($purchaseLineItems->isEmpty())
          <tr>
            <td>
                <select class="custom-select product-purchase-select" name="productPurchaseSelect[]" id="product-purchase-select-1">
                    <option value='' selected>Choose...</option>
                    
                    @foreach ($products as $product)
                      <option value="{{ $product->id }}" price="{{ $product->price }}" tax="{{ $product->tax }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <input type="number" step=".01" name="productPrice[]" id="input-product-price-1" class="form-control form-control-alternative product-price" placeholder="Price" value="" required>
            </td>
            
            <td>
                <input type="number" step=".01" name="productTax[]" id="input-product-tax-1" class="form-control form-control-alternative product-tax" placeholder="Tax" value="" required>
            </td>
            
            <td>
                <input type="number" step=".01" name="productQuantity[]" id="input-product-quantity-1" class="form-control form-control-alternative product-quantity" placeholder="Quantity" value="" required>
            </td>

            <td>
                <button type="button" class="btn btn-danger btn-block btn-remove-purchase-line-item">Remove</button>
            </td>
          </tr>
        @else
          @foreach ($purchaseLineItems as $purchaseLineItem)
            <tr>
              <td>
                  <select class="custom-select product-purchase-select" name="productPurchaseSelect[]" id="product-purchase-select-1">
                      <option value=''>Choose...</option>
                      
                      @foreach ($products as $product)
                        <option {{$product->id == $purchaseLineItem->product->id ? 'selected' : '' }} value="{{ $product->id }}" price="{{ $product->price }}" tax="{{ $product->tax }}">{{ $product->name }}</option>
                      @endforeach
                  </select>
              </td>
              <td>
              <input type="number" step=".01" name="productPrice[]" id="input-product-price-1" class="form-control form-control-alternative product-price" placeholder="Price" value="{{ $purchaseLineItem->price }}" required>
              </td>
              
              <td>
                  <input type="number" step=".01" name="productTax[]" id="input-product-tax-1" class="form-control form-control-alternative product-tax" placeholder="Tax" value="{{ $purchaseLineItem->tax }}" required>
              </td>
              
              <td>
                  <input type="number" step=".01" name="productQuantity[]" id="input-product-quantity-1" class="form-control form-control-alternative product-quantity" placeholder="Quantity" value="{{ $purchaseLineItem->quantity }}" required>
              </td>

              <td>
                  <button type="button" class="btn btn-danger btn-block btn-remove-purchase-line-item">Remove</button>
              </td>
            </tr>
          @endforeach
        @endif
        </tbody>
      </table>
  
  </div>
</div>
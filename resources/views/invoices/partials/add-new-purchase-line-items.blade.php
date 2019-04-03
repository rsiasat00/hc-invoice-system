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
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
        <tr id="product-row-1">

            <td>
                <select class="custom-select product-purchase-select" name="product-purchase-select-1" id="product-purchase-select-1">
                    <option selected>Choose...</option>
                    
                    @foreach ($products as $product)
                <option value="{{ $product->id }}" price="{{ $product->price }}" tax="{{ $product->tax }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <input type="number" name="product-price-1" id="input-product-price-1" class="form-control form-control-alternative product-price" placeholder="Price" value="" required>
            </td>
            
            <td>
                <input type="number" name="product-tax-1" id="input-product-tax-1" class="form-control form-control-alternative product-tax" placeholder="Tax" value="" required>
            </td>
            
            <td>
                <button type="button" class="btn btn-danger btn-block btn-remove-purchase-line-item">Remove</button>
            </td>
        </tr>

        </tbody>
      </table>
  
  </div>
</div>
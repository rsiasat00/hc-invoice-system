<div class="d-flex justify-content-between align-items-center mb-4">
    <h6 class="heading-small text-muted pt-3" >{{ __('Add New Purchase Line Items') }}</h6>

    <button type="button" class="btn btn-primary">Add Purchase Line Item</button>
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
                <select class="custom-select" id="product_1">
                    <option selected>Choose...</option>
                    @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <input type="number" name="product_price_1" id="input-product-price-1" class="form-control form-control-alternative" placeholder="Price" value="" required>
            </td>
            
            <td>
                <input type="number" name="product_tax_1" id="input-product-tax-1" class="form-control form-control-alternative" placeholder="Tax" value="" required>
            </td>
            
            <td>
                <button type="button" class="btn btn-danger btn-block btn-remove-purchase-line-item">Remove</button>
            </td>
        </tr>

        </tbody>
      </table>
  
  </div>
</div>
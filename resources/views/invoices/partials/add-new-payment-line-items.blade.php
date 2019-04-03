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
          <tr>
            <td>
                <select class="custom-select product-payment-select" name="productPaymentSelect[]" id="product-payment-select-1">
                  <option value='' selected>Choose...</option>
                  <option value="cash">Cash</option>
                  <option value="check">Check</option>
                  <option value="credit">Credit</option>
                </select>
            </td>
            <td>
                <input type="number" name="productAmount[]" id="input-product-amount-1" class="form-control form-control-alternative product-amount" placeholder="Amount" value="" required>
            </td>
            
            <td>
                <button type="button" class="btn btn-outline-danger btn-block btn-remove-payment-line-item">Remove</button>
            </td>
          </tr>
          
        </tbody>
      </table>
  
  </div>
</div>
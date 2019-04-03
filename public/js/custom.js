$(document).ready(function() {

  // Remove Record
  $(".btn-delete-record").on('click', function(e) {
    e.preventDefault();

    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#5e72e4',
      cancelButtonColor: '#f5365c',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {
        this.parentElement.submit()
      }
    })
  })
  // Remove Purchase / Payment Line Items
  $(".btn-remove-purchase-line-item, .btn-remove-payment-line-item").on('click', function(e){
    e.preventDefault();

    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#5e72e4',
      cancelButtonColor: '#f5365c',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {
        var tr = $(this).parent().parent();

        if(tr.parent().find('tr').length > 1) {
          tr.remove();
          Swal.fire({
            title: 'Deleted!',
            text: "Your line item has been deleted.",
            type: 'success',
            confirmButtonColor: '#5e72e4'
          })
        } else {
          Swal.fire({
            title: 'Unable to delete!',
            text: "Please provide at least 1 line item.",
            type: 'error',
            confirmButtonColor: '#5e72e4'
          })
        }
      }
    })
  });

  // Onchange Product on Purchase Line Items
  $(".product-purchase-select").on('change', function(e) {
    e.preventDefault();
    var selectedProduct = $("option:selected", this);
    
    productPrice = selectedProduct.attr('price');
    productTax = selectedProduct.attr('tax');
    
    $(this).parent().parent().find("input[name^='productPrice']").val(productPrice);
    $(this).parent().parent().find("input[name^='productTax']").val(productTax);
    $(this).parent().parent().find("input[name^='productQuantity']").val(productPrice ? 1 : '');
  })

  // Add New Purchase Line Items
  $(".btn-add-purchase-line-item").on('click', function(e) {
    e.preventDefault();

    var trLength = $(this).parent().next().find('tbody tr').length;
    var lastTR = $(this).parent().next().find('tbody tr:last');
    var clonedLastTR = lastTR.clone(true, true);
    var latestRowCount = (trLength + 1);

    clonedLastTR.find('.product-purchase-select')
      .attr('id', 'product-purchase-select-' + latestRowCount)
      .attr('name', 'productPurchaseSelect[]')
      .val('');
    clonedLastTR.find('.product-price')
      .attr('id', 'product-price-' + latestRowCount)
      .attr('name', 'productPrice[]')
      .val('');
    clonedLastTR.find('.product-tax')
      .attr('id', 'product-tax-' + latestRowCount)
      .attr('name', 'productTax[]')
      .val('');
    clonedLastTR.find('.product-quantity')
      .attr('id', 'product-quantity-' + latestRowCount)
      .attr('name', 'productQuantity[]')
      .val('');
    clonedLastTR.insertAfter(lastTR);
  })

  // Add New Payment Line Items
  $(".btn-add-payment-line-item").on('click', function(e) {
    e.preventDefault();

    var trLength = $(this).parent().next().find('tbody tr').length;
    var lastTR = $(this).parent().next().find('tbody tr:last');
    var clonedLastTR = lastTR.clone(true, true);
    var latestRowCount = (trLength + 1);

    clonedLastTR.find('.product-payment-select')
      .attr('id', 'product-payment-select-' + latestRowCount)
      .attr('name', 'productPaymentSelect[]')
      .val('Cash');
    clonedLastTR.find('.product-amount')
      .attr('id', 'product-amount-' + latestRowCount)
      .attr('name', 'productAmount[]')
      .val('');
    clonedLastTR.insertAfter(lastTR);
  })
});

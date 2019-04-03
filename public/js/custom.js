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
    
    $(this).parent().parent().find("input[name^='product-price']").val(productPrice);
    $(this).parent().parent().find("input[name^='product-tax']").val(productTax);
  })

  // Add New Purchase Line Items
  $(".btn-add-purchase-line-item").on('click', function(e) {
    e.preventDefault();

    var trLength = $(this).parent().next().find('tbody tr').length;
    var lastTR = $(this).parent().next().find('tbody tr:last');
    var clonedLastTR = lastTR.clone(true, true);
    var latestRowCount = (trLength + 1);

    clonedLastTR.attr('id', 'product-row-' + latestRowCount)
    clonedLastTR.find('.product-purchase-select')
      .attr('id', 'product-purchase-select-' + latestRowCount)
      .attr('name', 'product-purchase-select-' + latestRowCount);
    clonedLastTR.find('.product-price')
      .attr('id', 'product-price-' + latestRowCount)
      .attr('name', 'product-price-' + latestRowCount)
      .val('');
    clonedLastTR.find('.product-tax')
      .attr('id', 'product-tax-' + latestRowCount)
      .attr('name', 'product-tax-' + latestRowCount)
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
      .attr('name', 'product-payment-select-' + latestRowCount);
    clonedLastTR.find('.product-amount')
      .attr('id', 'product-amount-' + latestRowCount)
      .attr('name', 'product-amount-' + latestRowCount)
      .val('');
    clonedLastTR.insertAfter(lastTR);
  })
});

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

    // Add Invoice Sidebar Click
    $('a.sidebar-add-invoice').on('click', function(e) {
        e.preventDefault();
    });

});

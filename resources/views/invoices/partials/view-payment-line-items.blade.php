<h6 class="heading-small text-muted mb-4">{{ __('Payment Line Items Information') }}</h6>
<div class="pl-lg-4">
    <div class="table-responsive">
        <table class="table align-items-center">
            <thead class="thead-light">
            <tr>
                <th scope="col">Payment Type</th>
                <th scope="col">Amount</th>
            </tr>
            </thead>
            <tbody>
                @if(!$paymentLineItems->isEmpty())
                    @foreach ($paymentLineItems as $paymentLineItem)
                        <tr>
                            <td>
                                <div class="form-group">
                                    <span class="form-control form-control-alternative">{{ $paymentLineItem->payment_type }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <span class="form-control form-control-alternative">{{ $paymentLineItem->amount }}</span>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <div class="form-group">
        <label class="form-control-label" for="input-payment-line-total">{{ __('Payment Line Total') }}</label>
        <span class="form-control form-control-alternative">{{ $paymentLineItemsTotal }}</span>
    </div>
</div>


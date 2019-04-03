<h6 class="heading-small text-muted mb-4">{{ __('Invoice Information') }}</h6>
<div class="pl-lg-4">
    <div class="form-group">
        <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
        <span class="form-control form-control-alternative">{{$invoice->name}}</span>
    </div>

    <div class="form-group">
        <label class="form-control-label" for="input-address">{{ __('Address') }}</label>
        <span class="form-control form-control-alternative">{{$invoice->address}}</span>
    </div>

    <div class="form-group">
        <label class="form-control-label" for="input-invoice-dat">{{ __('Invoice Date') }}</label>
        <span class="form-control form-control-alternative">{{$invoice->invoice_date}}</span>
    </div>

    <div class="form-group">
        <label class="form-control-label" for="input-invoice-number">{{ __('Invoice Number') }}</label>
        <span class="form-control form-control-alternative">{{$invoice->invoice_number}}</span>
    </div>

    <div class="form-group">
        <label class="form-control-label" for="input-due-date">{{ __('Due Date') }}</label>
        <span class="form-control form-control-alternative">{{$invoice->due_date}}</span>
    </div>

    <div class="form-group">
        <label class="form-control-label" for="input-note">{{ __('Note') }}</label>
        <span class="form-control form-control-alternative">{{$invoice->note}}</span>
    </div>
</div>
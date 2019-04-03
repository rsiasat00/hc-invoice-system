<h6 class="heading-small text-muted mb-4">{{ __('Invoice Information') }}</h6>
<div class="pl-lg-4">
    
    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-name">{{ __('Name') }}&nbsp;<span class="text-danger">*</span></label>
        <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', !empty($invoice) ? $invoice->name : '') }}" required autofocus>

        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-address">{{ __('Address') }}&nbsp;<span class="text-danger">*</span></label>
        <textarea rows="5" name="address" id="input-address" class="form-control form-control-alternative{{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="{{ __('Address') }}" required>{{ old('address', !empty($invoice) ? $invoice->address : '') }}</textarea>

        @if ($errors->has('address'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('invoice_date') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-invoice-date">{{ __('Invoice Date') }}&nbsp;<span class="text-danger">*</span></label>
        <input type="date" name="invoice_date" id="input-invoice-date" class="form-control form-control-alternative{{ $errors->has('invoice_date') ? ' is-invalid' : '' }}" placeholder="{{ __('Invoice Date') }}" value="{{ old('invoice_date', !empty($invoice) ? $invoice->invoice_date : '') }}" required>

        @if ($errors->has('invoice_date'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('invoice_date') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('invoice_number') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-invoice-number">{{ __('Invoice Number') }}&nbsp;<span class="text-danger">*</span></label>
        <input type="number" name="invoice_number" id="input-invoice-number" class="form-control form-control-alternative{{ $errors->has('invoice_number') ? ' is-invalid' : '' }}" placeholder="{{ __('Invoice Number') }}" value="{{ old('invoice_number', !empty($invoice) ? $invoice->invoice_number : '') }}" required>

        @if ($errors->has('invoice_number'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('invoice_number') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('due_date') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-due-date">{{ __('Due Date') }}&nbsp;<span class="text-danger">*</span></label>
        <input type="date" name="due_date" id="input-due-date" class="form-control form-control-alternative{{ $errors->has('due_date') ? ' is-invalid' : '' }}" placeholder="{{ __('Due Date') }}" value="{{ old('due_date', !empty($invoice) ? $invoice->due_date : '') }}" required>

        @if ($errors->has('due_date'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('due_date') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('note') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-note">{{ __('Note') }}&nbsp;<span class="text-danger">*</span></label>
        <textarea rows="5" name="note" id="input-note" class="form-control form-control-alternative{{ $errors->has('note') ? ' is-invalid' : '' }}" placeholder="{{ __('Note') }}" required>{{ old('note', !empty($invoice) ? $invoice->note : '') }}</textarea>

        @if ($errors->has('note'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('note') }}</strong>
            </span>
        @endif
    </div>
</div>
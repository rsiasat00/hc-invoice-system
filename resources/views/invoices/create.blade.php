@extends('layouts.app', ['title' => __('Invoice Management')])

@section('content')
    @include('invoices.partials.header', ['title' => __('Invoice Management')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Add Invoice') }}</h3>
                            </div>
                            {{-- <div class="col-4 text-right">
                                <a href="{{ route('invoice.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('invoice.store') }}" autocomplete="off">
                            @csrf
                            
                            <h6 class="heading-small text-muted mb-4">{{ __('Invoice Information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}&nbsp;<span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-address">{{ __('Address') }}&nbsp;<span class="text-danger">*</span></label>
                                    <textarea rows="5" name="address" id="input-address" class="form-control form-control-alternative{{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="{{ __('Address') }}" value="{{ old('address') }}" required></textarea>

                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('invoice_date') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-invoice-date">{{ __('Invoice Date') }}&nbsp;<span class="text-danger">*</span></label>
                                    <input type="date" name="invoice_date" id="input-invoice-date" class="form-control form-control-alternative{{ $errors->has('invoice_date') ? ' is-invalid' : '' }}" placeholder="{{ __('Invoice Date') }}" value="{{ old('invoice_date') }}" required>

                                    @if ($errors->has('invoice_date'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('invoice_date') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('invoice_number') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-invoice-number">{{ __('Invoice Number') }}&nbsp;<span class="text-danger">*</span></label>
                                    <input type="number" name="invoice_number" id="input-invoice-number" class="form-control form-control-alternative{{ $errors->has('invoice_number') ? ' is-invalid' : '' }}" placeholder="{{ __('Invoice Number') }}" value="{{ old('invoice_number') }}" required>

                                    @if ($errors->has('invoice_number'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('invoice_number') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('due_date') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-due-date">{{ __('Due Date') }}&nbsp;<span class="text-danger">*</span></label>
                                    <input type="date" name="due_date" id="input-due-date" class="form-control form-control-alternative{{ $errors->has('due_date') ? ' is-invalid' : '' }}" placeholder="{{ __('Due Date') }}" value="{{ old('due_date') }}" required>

                                    @if ($errors->has('due_date'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('due_date') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('note') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-note">{{ __('Note') }}&nbsp;<span class="text-danger">*</span></label>
                                    <textarea rows="5" name="note" id="input-note" class="form-control form-control-alternative{{ $errors->has('note') ? ' is-invalid' : '' }}" placeholder="{{ __('Note') }}" value="{{ old('note') }}" required></textarea>

                                    @if ($errors->has('note'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('note') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- <h6 class="heading-small text-muted mb-4">{{ __('Add New Purchase Line Items') }}</h6>

                            <h6 class="heading-small text-muted mb-4">{{ __('Add New Payment Line Items') }}</h6> --}}
                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection
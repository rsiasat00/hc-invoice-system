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
                                <h3 class="mb-0">{{ __('View Invoice') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a class="btn btn-sm btn-info mr-0" href="{{ route('invoice.edit', $invoice) }}">{{ __('Edit') }}</a>
                                <form action="{{ route('invoice.destroy', $invoice) }}" method="post" class="d-inline-block">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-sm btn-danger" onclick="confirm('{{ __("Are you sure you want to delete this invoice?") }}') ? this.parentElement.submit() : ''">
                                        {{ __('Delete') }}
                                    </button>
                                </form>
                                <a href="{{ route('invoice.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
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
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection
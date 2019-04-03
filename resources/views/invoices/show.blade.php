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
                                    <button type="button" class="btn btn-sm btn-danger btn-delete-record">
                                        {{ __('Delete') }}
                                    </button>
                                </form>
                                <a href="{{ route('invoice.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        

                        @include('invoices.partials.view-invoice-information')
                        @include('invoices.partials.view-purchase-line-items')
                        @include('invoices.partials.view-payment-line-items')
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection
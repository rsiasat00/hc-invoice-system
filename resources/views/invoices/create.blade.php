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
                            <div class="col-4 text-right">
                                <a href="{{ route('invoice.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('invoice.store') }}" autocomplete="off">
                            @csrf
                            
                            @include('invoices.partials.invoice-information')
                            @include('invoices.partials.add-new-purchase-line-items')
                            @include('invoices.partials.add-new-payment-line-items')

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
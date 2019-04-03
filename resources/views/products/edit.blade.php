@extends('layouts.app', ['title' => __('Product Management')])

@section('content')
    @include('products.partials.header', ['title' => __('Product Management')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Edit Product') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <form action="{{ route('product.destroy', $product) }}" method="post" class="d-inline-block">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-sm btn-danger" onclick="confirm('{{ __("Are you sure you want to delete this product?") }}') ? this.parentElement.submit() : ''">
                                        {{ __('Delete') }}
                                    </button>
                                </form>
                                <a href="{{ route('product.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('product.update', $product) }}" autocomplete="off">
                            @csrf
                            @method('put')
                            
                            @include('products.partials.product-information')

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
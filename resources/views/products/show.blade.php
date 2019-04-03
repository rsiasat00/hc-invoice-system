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
                                <h3 class="mb-0">{{ __('View Product') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a class="btn btn-sm btn-info mr-0" href="{{ route('product.edit', $product) }}">{{ __('Edit') }}</a>
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
                        <h6 class="heading-small text-muted mb-4">{{ __('Product Information') }}</h6>
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                <span class="form-control form-control-alternative">{{$product->name}}</span>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label" for="input-price">{{ __('Price') }}</label>
                                <span class="form-control form-control-alternative">{{$product->price}}</span>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label" for="input-tax">{{ __('Tax') }}</label>
                                <span class="form-control form-control-alternative">{{$product->tax}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection
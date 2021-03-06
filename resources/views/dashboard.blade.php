@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    
    <div class="container-fluid mt--8">
        <div class="row mb-5">
            <div class="col-xl-8 offset-xl-2 mb-5 mb-xl-0">
                <div class="card bg-gradient-white shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="text-uppercase text-primary ls-1 mb-1">User Management</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <a class="btn btn-primary btn-block p-4" href="{{ route('user.create') }}">Add User</a>
                            </div>
                            <div class="col-6">
                                <a class="btn btn-primary btn-block p-4" href="{{ route('user.index') }}">Manage Users</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mb-5">
            <div class="col-xl-8 offset-xl-2 mb-5 mb-xl-0">
                <div class="card bg-gradient-primary shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="text-uppercase text-white ls-1 mb-1">Invoice Management</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <a class="btn btn-white text-primary btn-block p-4" href="{{ route('invoice.create') }}">Add Invoice</a>
                            </div>
                            <div class="col-6">
                                <a class="btn btn-white text-primary btn-block p-4" href="{{ route('invoice.index') }}">Manage Invoices</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-xl-8 offset-xl-2 mb-5 mb-xl-0">
                <div class="card bg-gradient-white shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="text-uppercase text-primary ls-1 mb-1">Product Management</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <a class="btn btn-primary btn-block p-4" href="{{ route('product.create') }}">Add Product</a>
                            </div>
                            <div class="col-6">
                                <a class="btn btn-primary btn-block p-4" href="{{ route('product.index') }}">Manage Products</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
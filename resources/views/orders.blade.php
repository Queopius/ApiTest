@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-3">
        <div class="col-md-12 text-center">
            <div class="card card-header">
                 <form class="form-inline my-2 my-lg-0">
                    <input
                        class="form-control mr-sm-2 search"
                        type="search"
                        placeholder="Buscar por el id del pedido"
                        aria-label="Search"
                        v-model="search"
                        @keyup="searchOrders"
                    >
                </form>
            </div>
        </div>
    </div>

</div>

<section class="container mt-4">
    <div class="row">
        <div class="col-md-3 mb-4" v-for="order in orders">
            <div class="card card-body text-center">
                <h2 class="font-weight-bold mt-3 id-order" v-text="order.id"></h2>

                <strong class="price-product">
                    $ <span v-text="order.order_details.product.name"></span> COP
                </strong>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
    .bg-light {
        background-color: #fff !important;
    }

    .search {
        width: 100% !important;
    }

    .price-product {
        font-size: 1.4rem;
    }

    .id-order {
        font-size: 1.5rem;
    }
</style>
@endpush

@push('scripts')

    <script src="{{ asset('js/order/order.js') }}"></script>

@endpush

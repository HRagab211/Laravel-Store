
@section('title','Cart')

@include('layout.app')
<?php
use App\Models\Product;

?>
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shopping Cart</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
< <!-- Cart Start -->
@if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{session()->get('success')}}
    </div>
@endif

@if (session()->has('chekout_faild'))
<div class="alert alert-warning" role="alert">
    {{ session()->get('chekout_faild') }}
  </div>
@endif
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                @if (isset($products))
                @foreach ($products->items as $prod)

                <tr>
                    <td class="align-middle"><img src="{{ asset('uploads/'.$prod['image']) }}" alt="" style="width: 50px;"> {{ $prod['product_name'] }}</td>
                        <td class="align-middle"> ${{ $prod['price']}}</td>
                        <td class="align-middle">
                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                <a href="{{route('cart.dec',$prod['id'])}}">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-minus" >
                                    <i class="fa fa-minus"></i>
                                </div>
                                </a>
                                <input type="text" class="form-control form-control-sm bg-secondary text-center" value="{{ $prod['qty'] }}">
                                <div class="input-group-btn">
                                    <a href="{{route('cart.inc',$prod['id'])}}">
                                    <button class="btn btn-sm btn-primary btn-plus">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle">${{ $prod['price']*$prod['qty'] }}</td>
                        <td class="align-middle"><a href="{{ route('cart.destroy',$prod['id']) }}"><button class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button></a></td>
                    </tr>

                    @endforeach
                    @else
                    <h1 style="color: red">Your cart is empty !</h1>
                    @endif


                </tbody>
            </table>
            @if (session()->has('cart'))
                
            <a href="{{ route('cart.delete_all') }}"><button class="btn btn-sm btn-primary">Delete All</button></a>
            @endif
        </div>
        <div class="col-lg-4">
            <form class="mb-5" action="">
                <div class="input-group">
                    <input type="text" class="form-control p-4" placeholder="Coupon Code">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Apply Coupon</button>
                    </div>
                </div>
            </form>
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Subtotal</h6>
                        <h6 class="font-weight-medium">${{ session()->has('cart')?session()->get('cart')->totalprice:'0' }}</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">$20</h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold"> ${{ session()->has('cart')?session()->get('cart')->totalprice+20:'20' }}</h5>
                    </div>
                    <a href="{{ route('checkout.index') }}"><button class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->


    @include('layout.footer')

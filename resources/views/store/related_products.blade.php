
@section('title','Home')
@include('layout.app')




    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Products</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">

                @foreach ( $products as $prod )
                    
                
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="{{ asset('uploads/'.$prod->image) }}" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">{{ $prod->product_name }}</h6>
                        <div class="d-flex justify-content-center">
                            <h6>{{ $prod->price }}</h6><h6 class="text-muted ml-2"><del>{{ $prod->old_price }}</del></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="{{ route('product.details',$prod->id) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                        <a href="{{ route('cart.add',$prod->id) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                    </div>
                </div>
            </div>

            @endforeach
            

        </div>
    </div>
    <!-- Products End -->




    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">

                    @foreach ( $products as $prod )

                    <div class="vendor-item border p-4">
                        <img src="{{ asset('uploads/'.$prod->image) }}" alt="{{ $prod->product_name }}">
                    </div>
      @endforeach
            
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->

    @include('layout.footer')
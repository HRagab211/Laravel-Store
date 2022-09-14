
@section('admin_title','orders')
<!-- sidebar Start -->
@include('admin.layouts.sidebar')
<!-- sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('admin.layouts.navebar')
            <!-- Navbar end -->

            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="col-12">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4">Confirmed order</h6>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Customer Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">ZIP</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php   $c=1?>
                                    @foreach ( $orders as $order )
                                    <tr>
                                        <th scope="row">{{ $c }}</th>
                                        <td> <a href="{{ route('orders.details',$order->id) }}"> {{ $order->First_name.' '.$order->Last_name }}</a></td>
                                        <td>{{ $order->email }}</td>
                                        <td>{{ $order->State }}</td>
                                        <td>{{ $order->zip }}</td>
                                        <td>${{ $order->total }}</td>
                                    </tr>
                                   <?php    $c++?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Blank End -->

{{-- @include('admin.layouts.footer') --}}

        </div>
        <!-- Content End -->

@include('admin.layouts.js_lib')

</html>
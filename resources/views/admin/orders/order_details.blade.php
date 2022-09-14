
@section('admin_title','order details')
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
                        <h6 class="mb-4">Basic Navs & Tabs</h6>
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                    aria-selected="true">Customer information</button>
                                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-profile" type="button" role="tab"
                                    aria-controls="nav-profile" aria-selected="false">Order information</button>
                                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-contact" type="button" role="tab"
                                    aria-controls="nav-contact" aria-selected="false"> Actions </button>
                            </div>
                        </nav>
                        <div class="tab-content pt-3" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="col-sm-12 col-xl-6">
                                    <div class="bg-secondary rounded h-100 p-4">
                                        <h6 class="mb-4">Customer information</h6>
                                        <ul class="list-group">
                                            <pre>
                                            <li class="list-group-item bg-transparent">     Customer Name       =>      {{ $order->First_name.' '.$order->Last_name }}  </li>
                                            <li class="list-group-item bg-transparent">     Address 1           =>      {{ $order->Address_1 }}                         </li>
                                            <li class="list-group-item bg-transparent">     Address 2           =>      {{ $order->Address_2 }}                         </li>
                                            <li class="list-group-item bg-transparent">     Email               =>      {{ $order->email }}                             </li>
                                            <li class="list-group-item bg-transparent">     Phone               =>      {{ $order->Phone }}                             </li>
                                            <li class="list-group-item bg-transparent">     Country             =>      {{ $order->Country }}                           </li>
                                            <li class="list-group-item bg-transparent">     City                =>      {{ $order->City }}                              </li>
                                            <li class="list-group-item bg-transparent">     State               =>      {{ $order->State }}                             </li>
                                            <li class="list-group-item bg-transparent">     Zip                 =>      {{ $order->zip }}                               </li>
                                            <li class="list-group-item bg-transparent">     Date                =>      {{ $order->created_at }}                        </li>
                                        </pre>
                                        </ul>
                                    </div>
                                </div>                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="col-12">
                                    <div class="bg-secondary rounded h-100 p-4">
                                        <h6 class="mb-4">Order Details</h6>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Image</th>
                                                        <th scope="col">Product Name</th>
                                                        <th scope="col">Product price</th>
                                                        <th scope="col">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $c=1?>
                                                    @foreach ( $products as $product )
                                                        
                                                    <tr>
                                                        <th scope="row">{{ $c }}</th>
                                                        <td> <img class="rounded-circle flex-shrink-0" src="{{ asset('uploads/'.$product->image) }}" alt="" style="width: 40px; height: 40px;"></td>
                                                        <td>{{ $product->product_name }}</td>
                                                        <td>${{ $product->price }}</td>
                                                        <?php   $c++?>
                                                        @endforeach
                                                        <td><h5 style="color: red"> ${{ $order->total }}</h5></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>                         
                              </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <div class="col-sm-12 col-xl-6">
                                    <div class="bg-secondary rounded h-100 p-4">
                                        <h6 class="mb-4">Select Action</h6>
                                        <div class="m-n2">
                                            @if ($order->Confirmed=='0')
                                                
                                            <a href="{{ route('orders.confirm',$order->id) }}"><button class="btn btn-success w-100 m-2" type="button">Confirm order</button></a>
                                            <a href="{{ route('orders.done',$order->id) }}"><button class="btn btn-info w-100 m-2" type="button">Send message AS "Order completed"</button></a>
                                            <a href="{{ route('order.delete',$order->id) }}"><button class="btn btn-outline-primary w-100 m-2" type="button">Delete Order</button></a>
                                            @elseif ($order->Confirmed=='1')
                                            <a href="{{ route('orders.unconfirm',$order->id) }}"><button class="btn btn-outline-primary w-100 m-2" type="button">Unconfirm Order</button></a>

                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
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
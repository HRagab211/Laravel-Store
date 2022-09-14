<div>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Recent Sales</h6>
                <a href="{{ url('') }}">Show All</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">#</th>
                            <th scope="col">Date</th>
                            <th scope="col">Invoice</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($sales)
                            
                        <?php   $c=1?>
                        @foreach ( $sales as $sale )
                            
                        <tr>
                            <td>{{ $c }}</td>
                            <td>{{ $sale->sold_at }}</td>
                            <td>{{ $sale->id }}</td>
                            <td>{{ $sale->name }}</td>
                            <td>${{ $sale->total }}</td>
                            <td><a class="btn btn-sm btn-primary" href="{{ route('orders.details',$sale->id)}}">Detail</a></td>
                        <?php$c++?>
                        </tr>
                        @endforeach
                        @else
                        <h1>NO recent orders</h1>
                        @endif
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

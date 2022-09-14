<!-- sidebar Start -->
@include('admin.layouts.sidebar')
<!-- sidebar End -->

<!-- Content Start -->
<div class="content">
    <!-- Navbar Start -->
    @include('admin.layouts.navebar')

    <div class="col-12">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Products Table</h6>
            <div class="table-responsive">
                <table class="table">
                    <thead>

                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">price</th>
                            {{-- <th scope="col">Category</th> --}}
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
  <x-all-products></x-all-products>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- Content End -->

@include('admin.layouts.js_lib')

</html>

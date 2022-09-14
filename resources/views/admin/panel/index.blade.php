

@section('admin_title','Admin Home')
<!-- sidebar Start -->
@include('admin.layouts.sidebar')
<!-- sidebar End -->
        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('admin.layouts.navebar')
            <!-- Navbar end -->


            <!-- Recent Sales Start -->
            <x-recent-sales></x-recent-sales>  
            <!-- Recent Sales End -->

            <!-- Widgets Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                {{-- Tasks Start --}}
                <x-tasks></x-tasks>
                {{-- Tasks End --}}
                </div>
            </div>
            <!-- Widgets End -->

@include('admin.layouts.footer')

        </div>
        <!-- Content End -->

@include('admin.layouts.js_lib')

</html>
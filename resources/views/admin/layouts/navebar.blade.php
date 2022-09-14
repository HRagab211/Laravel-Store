<nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
    <a href="{{ url("index") }}" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
    </a>
    <a href="{{ url("#") }}" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>

    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown">
            <a href="{{ url("#") }}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fa fa-bell me-lg-2"></i>
                
                <span class="d-none d-lg-inline-flex">Notificatin</span>
                
            </a>
            <?php $count=Auth::guard('admin')->user()->unreadNotifications->count();?>
            <span class="badge">{{$count}}</span>
            <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                @if ($count>0)
                @foreach (Auth::guard('admin')->user()->unreadNotifications as $noty )

                <a href="{{ route('make.read',$noty->data['order_id'])}}" class="dropdown-item">
                    <h6 class="fw-normal mb-0">{{ $noty->data['user_name'] }} </h6>
                    <b>You Have A new Order</b><br>
                    <small> At {{ $noty->created_at }}</small>
                </a>
                <hr class="dropdown-divider">
                @endforeach
                @endif
                @if ($count<=0)
                <h5> NO orders Yet </h5>
             @endif
            </div>
        </div>

        <div class="nav-item dropdown">
            <a href="{{ url("#") }}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <span class="d-none d-lg-inline-flex">{{ Auth::guard('admin')->user()->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                <a href="{{ route('admin.logout') }}" class="dropdown-item">Log Out</a>
            </div>
        </div>
    </div>
</nav>
@if (session()->has('success'))
<div class="alert alert-success" role="alert">
{{ session()->get('success') }}
</div>
    
@endif
<!-- Navbar End -->
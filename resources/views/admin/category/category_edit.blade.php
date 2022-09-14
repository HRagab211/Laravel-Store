<!-- sidebar Start -->
@include('admin.layouts.sidebar')
<!-- sidebar End -->

<!-- Content Start -->
<div class="content">
    <!-- Navbar Start -->
    @include('admin.layouts.navebar')
    <!-- Navbar end -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Add new category</h6>
                <div class="form-floating mb-3">
                    <input type="text" name='name' value="{{ $category->name }}" class="form-control" id="floatingInput"
                        placeholder="Name of new category">
                    <label for="floatingInput">Category name</label>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Category image</label>
                    <input class="form-control bg-dark" name="image"  type="file" id="formFile">
                </div>
                <div class="form-floating">
                    <button type='submit' class="btn btn-light m-2">update</button>

                </div>
            </div>
        </div>
    </form>
@include('admin.layouts.footer')

</div>
<!-- Content End -->

@include('admin.layouts.js_lib')

</html>

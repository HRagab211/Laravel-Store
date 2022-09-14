<div>
    <div class="col-sm-12">
        <div class="h-100 bg-secondary rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">To Do List</h6>
            </div>
            <form action="{{ route('task.add') }}" method="post">
                @csrf
            <div class="d-flex mb-2">
                <input class="form-control bg-dark border-0" type="text" name='task' placeholder="Enter task">
                <button type="submit" class="btn btn-primary ms-2">Add</button>
            </div>
        </form>
        @foreach ( $tasks as $task )
            @if ($task->status=='0')
                
            <div class="d-flex align-items-center border-bottom py-2">
                <input class="form-check-input m-0" type="checkbox">
                <div class="w-100 ms-3">
                    <div class="d-flex w-100 align-items-center justify-content-between">
                        <span>{{ $task->task_name }}</span>
                        <a href="{{ route('task.done',$task->id) }}"><button class="btn btn-sm"><i class="fa fa-times"></i></button></a>
                    </div>
                </div>
            </div>
            
            @elseif ($task->status=='1')  
            <div class="d-flex align-items-center border-bottom py-2">
                <input class="form-check-input m-0" type="checkbox" checked>
                <div class="w-100 ms-3">
                    <div class="d-flex w-100 align-items-center justify-content-between">
                        <span><del>{{ $task->task_name }}</del></span>
                    </div>
                </div>
            </div>
            
            @endif
            @endforeach

        </div>
    </div>
</div>


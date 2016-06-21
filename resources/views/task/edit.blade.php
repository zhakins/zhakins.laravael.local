    @extends('layouts.app')
    @section('content')

    <div class="col-md-12">
        <h3>Create Task</h3>
    <div class="panel panel-primary">
        <div class="panel-heading">Task list</div>
        <div class="panel-body">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit task</div>
                    <div class="panel-body">
                        @include('common.errors')
                        <form action="{{route('newTask.update',$task->id)}}" method="post">

                            {!! csrf_field() !!}
                            {!! method_field('PUT') !!}
                            <div class="form-group">
                                <label>Task name</label>
                                <input type="text" name="task" class="form-control" value="{{$task->name}}">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    @endsection

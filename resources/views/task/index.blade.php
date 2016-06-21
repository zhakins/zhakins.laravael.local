@extends('layouts.app')
@section('content')



    <div class="col-md-12">
        <h3>Dashboard</h3>
        @if(count($tasks) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">Current tasks</div>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                    <th>Task</th>
                    <th>&nbsp;</th>
                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td class="table-text">
                                <div><a href="{{route('newTask.edit',$task->id)}}">{{ $task->name }}</a></div>
                            </td>
                            <td>
                                <form   method="post" class="delete">
                                    <input type="hidden" name="task" value="{{$task->id}}">
                                    <button class="btn btn-danger"><i class="fa fa-trash">Delete</i></button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection

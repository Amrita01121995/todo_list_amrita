@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>My Do List App</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('tasks.store') }}" method="POST" class="form-inline mb-3">
            @csrf
            <input type="text" name="task" class="form-control col-md-8 mr-2" placeholder="New Task">
            <button type="submit" class="btn btn-primary">Add Task</button>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Task</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $task->task }}</td>
                        <td>{{ $task->status ? 'Done' : 'Pending' }}</td>
                        <td>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                            </form>
                            @if(!$task->status)
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-success btn-sm">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

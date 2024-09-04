@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Edit Task</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Task Name</label>
                <input type="text" name="task" class="form-control" value="{{ $task->task }}">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" name="status" class="form-check-input" {{ $task->status ? 'checked' : '' }}>
                <label class="form-check-label" for="is_completed">Completed</label>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
</div>
@endsection

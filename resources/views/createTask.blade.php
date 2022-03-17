@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h1>create task</h1>
<form action="/tasks" method="post">
    @csrf
    <div class="mb-3 col-3">
        <label for="exampleFormControlInput1" class="form-label">Task Name</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="enter task name" name="name">
    </div>
    <div class="mb-3 col-5">
        <label for="exampleFormControlTextarea1" class="form-label">Task Details</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="details"></textarea>
    </div>
    <div class="mb-3 col-3">
        <label class="form-label">Deadline(Date &time)</label>
        <input class="form-control" type="date" name="date">
        <input class="form-control" type="time" name="time">
    </div>
    <button type="submit">Schedule</button>
</form>
@endsection
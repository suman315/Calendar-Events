@extends('layouts.event')

@section('content')


<div class="col-5 mx-auto">
	<h1>Edit Event</h1>
    <form action="/event/{{$event->id}}" id="add-event-form" method="POST">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="exampleInputEmail1">
                Event detail
            </label>
            <input class="form-control" name="title" value="{{$event->title}}" type="text">
            </input>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">
                Date
            </label>
            <input class="form-control" name="date" value="{{ $event->event_date }}" type="date">
            </input>
        </div>



       	<button type="submit" class="btn btn-primary btn-sm btn-block">Save changes</button>

    </form>

</div>

@stop

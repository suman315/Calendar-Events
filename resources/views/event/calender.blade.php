@extends('layouts.event')

@section('content')

<div class="row">
	<div class="col-7">
		Personal Calender
	</div>
	<div class="col-5">
		<button type="button" class="btn btn-success btn-sm btn-block" data-toggle="modal" data-target="#add-event">Add Event</button>
	</div>
</div>

@include('event.add-event')

<ul class="list-group" style="height: 400px; overflow-y: scroll;">
	@foreach($events as $event)
		 <li class="list-group-item py-1">
		 	<div class="row">
			 	<div class="col-6">
			 	{{ $event->title }}
			 	</div>
			 	<div class="col-2">
			 		{{ date('d/m/y', strtotime($event->event_date) ) }}
			 	</div>
			 	<div class="col-2">
			 		<a href="/event/{{$event->id}}">
				 		<button type="button" class="btn btn-primary btn-sm btn-block">Edit</button>
				 	</a>
			 	</div>
			 	<div class="col-2">
			 		<form action="/event/{{$event->id}}" method="POST">
			 			{!! csrf_field() !!}
			 			{!! method_field('delete') !!}
			 		
				 		<button type="button" class="btn btn-danger btn-sm btn-block" onclick="$(this).closest('form').submit();">Delete</button>

			 		</form>
			 	</div>
			</div>
		 </li>
	@endforeach
</ul>



<div style="height: 600px; width: 800px;">
	<div id='calendar'></div>
</div>

<script>
	
$(function() {

  // page is now ready, initialize the calendar...
  $('#calendar').fullCalendar({
  	
		events: {!! $calenderEvents !!}
  });

});

</script>
@stop
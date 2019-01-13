@extends('layouts.app')
@section('content')

<link href="{{ asset('css/userlist.css') }}" rel="stylesheet">
<div class="container">
	<div class="out_div"><h3>USER LIST</h3></div>
	<div class="out_div"> 
	@foreach ($users as $user)
		<div class="inner_div">
			{{ $user->name }}
			@if ($isfriend[$user->id] == 0)
				<a href="/userlist/add/{{$user->id}}" class="add">&nbsp+</a>
			@else
				<a href="/userlist/remove/{{$user->id}}" class="add">&nbsp-</a>
			@endif
		</div>
	@endforeach
	</div>
</div>
@endsection
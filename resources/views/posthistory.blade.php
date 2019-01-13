@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="col-md-6">
				<h3> Post History</h3>
			</div>
		</div>
	</div>
	@foreach ($posts as $post)
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $post->created_at }}</div>
                <div class="col-md-6" style="margin-top: 10px; margin-bottom: 10px;">
                	{{ $post->content}}&nbsp&nbsp&nbsp&nbsp
                	<a onclick="editpost('p{{$post->id}}');" style="cursor: pointer;"> Edit </a>&nbsp&nbsp&nbsp&nbsp
                	<a href="/post/remove/{{$post->id}}"> Delete </a>
                	<form class="form-horizontal" id="p{{$post->id}}" method="POST" action="{{ route('post.update') }}" enctype="multipart/form-data" style="display: none;">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <div class="form-group"></div>
                            <div class="col-md-8">
                            	<input type="hidden" name="postid" value="{{$post->id}}">
                                <input id="content" type="textarea" class="form-control" name="content" placeholder="Post something!" value="{{ $post->content }}" required autofocus>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">
                                    Repost
                                </button>
                            </div>
                        </div>
                    </form>
                	
                </div>
            </div>
        </div>
    </div>
	@endforeach
</div>
<script src="{{ asset('js/posthistory.js') }}"></script>
@endsection
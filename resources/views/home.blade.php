@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <span class="help-block"> {{ $message }}</span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <form class="form-horizontal" method="POST" action="{{ route('post.add') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <div class="form-group"></div>
                            <div class="col-md-8 col-md-offset-2">
                                <input id="content" type="textarea" class="form-control" name="content" placeholder="Post something!" required autofocus>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">
                                    Post
                                </button>
                            </div>
                        </div>

                        <div class="form-group">
                            
                        </div>
                    </form>
            </div>
        </div>
    </div>
    <div>
        
    </div>
</div>
@endsection

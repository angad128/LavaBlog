@extends('main')

@section('title')
	| Create New Post
@endsection

@section('stylesheet')
    <link rel="stylesheet" type="text/css" href="http://parsleyjs.org/src/parsley.css">
@endsection

@section('content')
	<div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>Create New Post</h2>
                <hr>
                {!! Form::open(['route' => 'post.store', 'data-parsley-validate'=>'']) !!}
    				{{ Form::label('title',"Title:") }}
    				{{ Form::text('title', null, array('class'=>'form-control', 'required'=> '','minlength'=>'6','maxlength'=>'60', )) }}

    				{{ Form::label('body',"Description:") }}
    				{{ Form::textarea('body', null, array('class'=>'form-control','required'=>'','minlength'=>'10','maxlength'=>'255',)) }}

    				{{ Form::submit('Create Post',array('class' =>'btn btn-success btn-lg btn-block', 'style'=>'margin-top: 12px;')) }}
				{!! Form::close() !!}
            </div>
        </div>  
@endsection

@section('script')
    <script src="http://parsleyjs.org/dist/parsley.min.js"></script>
@endsection
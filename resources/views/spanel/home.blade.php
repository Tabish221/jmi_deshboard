@extends('spanel.layout')
@section('content')


<br>
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Hi <strong>{!! $user->name !!} </strong> Welcome To SuperPanel!</h3>
    </div>

    <div class="box-body" >



@if (session('status-success'))
    <div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('status-success') }}
    </div>
@endif

@if (session('status-error'))
    <div class="alert alert-danger">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('status-error') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    </div>

</div>


@stop
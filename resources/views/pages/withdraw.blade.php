<head>
@extends('layouts.layout')
	<title>
		@section('title')
		Withdraw from your acount
		@endsection
	</title>
</head>


<body>
@section('content')
	<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h1>Enter amount to withdraw</h1>
            {!! Form::open(['route' => 'cashwithdraw']) !!}
            
            <div class="form-group">
                {!! Form::label('Amount', 'Amount:') !!}
                {!! Form::text('amount',null,['class'=>'form-control']) !!}
            </div>
            
            <div class="form-group">
                {!! Form::submit('withdraw', ['class' => 'btn btn-primary form-control']) !!}
            </div>
            {!! Form::close() !!}
            <a class="btn btn-primary " href="{{route('/')}}">Cancel</a>
        </div>
        <div class="col-md-3"></div>
    </div>
		
	</div>
 @endsection   
</body>
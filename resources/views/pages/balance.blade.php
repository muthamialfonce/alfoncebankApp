@extends('layouts.layout')
@section('title')
Check balance
@endsection
<body>
@section('content')

	<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<h2>Your bank balance is:</h2>
			@foreach($balance as $balances)
				<div style="text-align: center; font-weight: bold; color: #000; font-size: 14px;">
					{{ $balances->amount }}
				</div>
				<br>
				@if($balances->amount >0)
				   {!! Form::open(['action'=>'bankController@create']) !!}
			       {!! Form::submit('Deposit',['class'=>'btn btn-primary btn-lg btn-block'])!!}
			       {!! Form::close() !!}

			       {!! Form::open(['action'=>'bankController@withdraw']) !!}
			       {!! Form::submit('Withdraw',['class'=>'btn btn-primary btn-lg btn-block'])!!}
			       {!! Form::close() !!}
			    @else
			    	{!! Form::open(['action'=>'bankController@create']) !!}
			       {!! Form::submit('Deposit',['class'=>'btn btn-primary btn-lg btn-block'])!!}
			       {!! Form::close() !!}   
			    @endif   
			@endforeach
			<a class="btn btn-primary btn-lg btn-block" href="{{route('/')}}">Cancel</a>
			<h4>Thank you for banking with us.</h4>
		</div>
		<div class="col-md-3"></div>
	</div>	
	</div>
@endsection
</body>	
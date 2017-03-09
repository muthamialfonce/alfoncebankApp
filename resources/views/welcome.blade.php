
@extends('layouts.layout')
@section('title')
Alfonce bank welcome
@endsection
<body>
    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                
            </div>
            <div class="col-md-6">
                @if(Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif
                
                <h2 style="text-align: center; color: #000;">Thank you for chosing to bank with us. Please select your transaction</h2>
                   {!! Form::open(['action'=>'bankController@index']) !!}
                   {!! Form::submit('Check Balance',['class'=>'btn btn-primary btn-lg btn-block'])!!}
                   {!! Form::close() !!}

                   {!! Form::open(['action'=>'bankController@create']) !!}
                   {!! Form::submit('Deposit',['class'=>'btn btn-primary btn-lg btn-block'])!!}
                   {!! Form::close() !!}

                   {!! Form::open(['action'=>'bankController@withdraw']) !!}
                   {!! Form::submit('Withdraw',['class'=>'btn btn-primary btn-lg btn-block'])!!}
                   {!! Form::close() !!}
                    
                
            </div>
            <div class="col-md-3">
                
            </div>
        </div>   
    </div>
   @endsection() 
</body>
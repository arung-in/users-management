@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! <br> 
                    <a href="{{ url('/home') }}">Back to Home</a> 

                    <hr> 
                    
                    <h3 class="page-title">Update Current User</h3>
                    
                    {!! Form::model($user, ['method' => 'PUT', 'files' => true, 'route' => ['newusers.update', $user->id]]) !!}

                    {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif 

                    {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('password'))
                        <p class="help-block">
                            {{ $errors->first('password') }}
                        </p>
                    @endif

                    {!! Form::label('image','Profile Image' , ['class' => 'control-label']) !!}
                    {!! Form::file('image', ['id' => 'upload_image', 'accept' => 'image/*']); !!} 


                    {!! Form::submit('Update', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>   
@endsection   

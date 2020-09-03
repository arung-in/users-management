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
                    <a href="{{ url('/users') }}">Users List</a> | 
                    <a href="{{ url('/home') }}">Back to Home</a> 

                    <hr> 

                    <create-user></create-user>
                </div>
            </div>
        </div>
    </div>
</div>   
@endsection  
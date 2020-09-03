@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! <br> 
                    <a href="{{ route('newusers.create') }}">Add New</a>  | <a href="{{ url('/home') }}">Back to Home</a> 

                    <hr>

                    <all-users></all-users>
 
                </div>
            </div>
        </div>
    </div>
</div>   
@endsection  
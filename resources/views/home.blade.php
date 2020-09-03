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

                    {{ Auth::user()->name  }} -
                    
                    You are logged in!
                    <hr>
                    <a href="{{ url('users') }}">Users List</a> |
                    <a href="/profile">Profile Edit</a>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection
  
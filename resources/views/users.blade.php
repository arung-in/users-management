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
                    <a href="{{ url('/users/create') }}">Add New</a>  | <a href="{{ url('/home') }}">Back to Home</a> 

                    <hr>

                    <all-users></all-users>

                    <!-- <div class="container">

                    <h1>Users List</h1>

                    <table class="table table-bordered data-table">

                        <thead>

                            <tr>

                                <th>No</th>

                                <th>Name</th>

                                <th>Email</th>

                                <th width="100px">Action</th>

                            </tr>

                        </thead>

                        <tbody>

                        </tbody>

                    </table>

                </div> -->
                </div>
            </div>
        </div>
    </div>
</div>   
@endsection  
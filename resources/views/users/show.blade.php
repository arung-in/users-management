@extends('adminlte::page') 

@section('content')
    <h3 class="page-title">Users</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            View
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>User Name</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email ID</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
  

            <p>&nbsp;</p>

            <a href="{{ route('users.index') }}" class="btn btn-default">Back to list</a>
        </div>
    </div>
@stop
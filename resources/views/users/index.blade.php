@inject('request', 'Illuminate\Http\Request')
@extends('adminlte::page') 
@section('content')
    <h3 class="page-title">Users</h3>
    <p>
        <a href="{{ route('users.create') }}" class="btn btn-success">Create</a>
        
    </p>
    <div class="panel panel-default">
        <div class="panel-heading">
            
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($users) > 0 ? 'datatable' : '' }} @can('user_delete') dt-select @endcan">
                <thead>
                    <tr>
                         
                        <th></th>
                        <th>User Name</th>
                        <th>Email</th> 
                        <th>Action</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($users) > 0)
                        @foreach ($users as $user) 
                            <tr data-entry-id="{{ $user->id }}">  
                                <td>
                                    @php 
                                    $img = $user->img
                                    @endphp
                                    
                                    @if (!empty($img))                                    
                                    <img style="width: auto; height: 50px;" class="img-fluid" src="{{ asset('storage/'. $img) }}" alt="" />
                                    @endif
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                     <a href="{{ route('users.show',[$user->id]) }}" class="btn btn-xs btn-primary">View</a>
                                     <a href="{{ route('users.edit',[$user->id]) }}" class="btn btn-xs btn-info">Edit</a>
                                     
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('are you sure');",
                                        'route' => ['users.destroy', $user->id])) !!}
                                    {!! Form::submit('delete', array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!} 
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9">No entries in table</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    
@stop
 
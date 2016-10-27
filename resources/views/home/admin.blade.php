@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <style>
                        .user-roles th,
                        .user-roles td {
                            padding: 10px;
                        }
                    </style>


                    @if(isset($responses))
                    <div>
                        @foreach($responses as $response)

                            <div class="alert alert-dismissible alert-success">
                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                              <strong>{{ $response }}</strong>
                            </div>

                        @endforeach
                    </div>
                    @endif

                    <form action="/home/change_role" method="POST">
                        <h3>List of registered users</h3>
                        <table class="user-roles">
                        <tr>
                            <th> ID </th>
                            <th> User Name </th>
                            <th> Current Role </th>
                            <th> Change To </th>
                            <th></th>
                        </tr>
                        @foreach($users as $user)
                            <tr>
                                <td> {{ $user->id }} </td>
                                <td> {{ $user->name }} </td>
                                <td> {{ $user-> role }} </td>
                                <td> 
                                    @if ($user->role != 'admin')
                                    <select name="id_{{ $user->id }}">
                                        @foreach(
                                            $roles = array(
                                                'admin',
                                                'editor',
                                                'viewer'
                                            )
                                            as $role)

                                            
                                            @if($user->role == $role)
                                                <option value="{{ $role }}" selected>{{ $role }} </option>
                                            @else
                                                <option value="{{ $role }}">{{ $role }} </option>
                                            @endif
                                        
                                        @endforeach
                                    </select>
                                    @else
                                        admin
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </table>
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" value="Change">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
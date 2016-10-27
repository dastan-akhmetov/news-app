@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in as an Admin!

                    <h3>List of registered users</h3>
                    <table>
                    <tr><th> Username </th><th> Role </th></tr>
                    @foreach($users as $user)
                        <tr><td> {{ $user->name }} </td><td> {{ $user-> role }} </td></tr>
                    @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
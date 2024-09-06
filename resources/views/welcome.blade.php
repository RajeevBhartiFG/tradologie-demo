@extends('layouts.web')

@section('content')
<div class="jumbotron text-center">
    <h1 class="display-4">Welcome to {{ config('app.name') }}</h1>
    <p class="lead">This application using PHP/Laravel and Mysql.</br>Presenting By: Rajeev Bharti  </p>   <hr class="my-4">
   
    <a class="btn btn-success btn-lg" href="/user-login" role="button">User Login</a>
    <a class="btn btn-primary btn-lg" href="/admin-login" role="button">Admin Login</a>
    <a class="btn btn-warning btn-lg" href="/provider-login" role="button">Service Provider Login</a>
</div>
@endsection

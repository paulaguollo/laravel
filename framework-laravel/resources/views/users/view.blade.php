@extends('layouts.fo')
 
@section('content')
    <h5>Info do User</h5>
    <p>{{ $user->name }}</p>
    <p>{{ $user->email }}</p>
@endsection
@extends('layouts.fo')
 
@section('content')
    <h5>Info do User</h5>
    <p>{{ $user->name }}</p>
    <p>{{ $user->email }}</p>


         <h4>Volte para a HOME <a href="{{route('home')}}">aqui</a></h4>

@endsection
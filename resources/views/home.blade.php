@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <user-component dataupdate="{{route('dataupdate')}}" :user=@json($user) ></user-component>
    </div>
</div>
@endsection

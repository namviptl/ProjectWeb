@extends('layouts.app')
@section('content')
<h1>dsads</h1>
@if ($name == 'nam')
<h5>Tôi là {{$name}}</h5>
@else
<h5>Tôi không phải là {{$name}}</h5>
@endif
@endsection('content')

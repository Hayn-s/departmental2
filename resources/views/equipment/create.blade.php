@extends('layouts.app')
@section('title','Add Equipment')
@section('content')
<div class="panel"><h1>Add Equipment</h1>
<form method="POST" action="{{ route('equipment.store') }}">@csrf @include('equipment._form')</form>
</div>
@endsection

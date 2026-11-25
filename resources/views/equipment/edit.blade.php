@extends('layouts.app')
@section('title','Edit Equipment')
@section('content')
<div class="panel"><h1>Edit Equipment</h1>
<form method="POST" action="{{ route('equipment.update',$equipment) }}">@csrf @method('PUT') @include('equipment._form')</form>
</div>
@endsection

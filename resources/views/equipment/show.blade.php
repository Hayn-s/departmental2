@extends('layouts.app')
@section('title','View Equipment')
@section('content')
<div class="panel"><h1>{{ $equipment->equipment_name }}</h1>
<p><strong>Category:</strong> {{ ucfirst($equipment->category) }}</p>
<p><strong>Unit price:</strong> ₱{{ number_format($equipment->unit_price,2) }}</p>
<p><strong>Description:</strong> {{ $equipment->description }}</p>
<p><strong>Availability:</strong> {{ ucfirst($equipment->availability_status) }}</p>
<div class="actions">
<a class="btn" href="{{ route('equipment.edit',$equipment) }}">Edit</a>
<a class="btn secondary" href="{{ route('equipment.index') }}">Back</a>
<form method="POST" action="{{ route('equipment.destroy',$equipment) }}" onsubmit="return confirm('Are you sure you want to delete this equipment record?')">
@csrf @method('DELETE')<button class="danger" type="submit">Delete</button></form>
</div></div>
@endsection

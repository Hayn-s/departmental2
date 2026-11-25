@extends('layouts.app')
@section('title','Equipment Reports')
@section('content')
<div class="panel">
<h1>Equipment Reports</h1>
<form method="GET" action="{{ route('reports.index') }}">
<div class="topline">
<div style="flex:1;min-width:200px"><label>Category</label><select name="category">
<option value="">All categories</option>@foreach($categories as $c)<option value="{{ $c }}" @selected($category===$c)>{{ ucfirst($c) }}</option>@endforeach
</select></div>
<div style="flex:1;min-width:200px"><label>Availability</label><select name="availability_status">
<option value="">All statuses</option>@foreach($statuses as $s)<option value="{{ $s }}" @selected($status===$s)>{{ ucfirst($s) }}</option>@endforeach
</select></div></div>
<div class="actions"><button>Apply Filters</button><a class="btn secondary" href="{{ route('reports.index') }}">Reset Filters</a>
<a class="btn" href="{{ route('reports.pdf',request()->query()) }}">Export PDF</a>
<a class="btn" href="{{ route('reports.excel',request()->query()) }}">Export Excel</a></div>
</form></div>
<div class="panel">
<h2>Equipment Price List</h2>
@if($records->isEmpty())<p>No equipment records match the selected filters.</p>
@else
<p>Available: {{ $records->where('availability_status','available')->count() }} |
Unavailable: {{ $records->where('availability_status','unavailable')->count() }} |
Total records: {{ $records->count() }}</p>
<table><thead><tr><th>Equipment</th><th>Category</th><th>Unit Price</th><th>Status</th></tr></thead><tbody>
@foreach($records as $item)<tr><td>{{ $item->equipment_name }}</td><td>{{ ucfirst($item->category) }}</td><td>₱{{ number_format($item->unit_price,2) }}</td><td>{{ ucfirst($item->availability_status) }}</td></tr>@endforeach
</tbody></table>
@endif
</div>
@endsection

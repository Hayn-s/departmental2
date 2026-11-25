@extends('layouts.app')
@section('title','Equipment Inventory')
@section('content')
<div class="panel">
    <div class="topline">
        <div><h1>Equipment Inventory</h1><p class="muted">Manage saved pickleball equipment records.</p></div>
        <a class="btn" href="{{ route('equipment.create') }}">+ Add Equipment</a>
    </div>
    <form method="GET" action="{{ route('equipment.index') }}" class="filters">
        <div><label>Category</label><select name="category"><option value="">All categories</option>@foreach(['paddles','balls','nets','accessories'] as $c)<option value="{{ $c }}" @selected($category === $c)>{{ ucfirst($c) }}</option>@endforeach</select></div>
        <div><label>Availability</label><select name="availability_status"><option value="">All statuses</option>@foreach(['available','unavailable'] as $s)<option value="{{ $s }}" @selected($status === $s)>{{ ucfirst($s) }}</option>@endforeach</select></div>
        <div class="actions"><button type="submit">Filter</button><a class="btn secondary" href="{{ route('equipment.index') }}">Reset</a></div>
    </form>
    @if($equipment->count())
    <div class="table-wrap"><table><thead><tr><th>Name</th><th>Category</th><th>Unit Price</th><th>Status</th><th>Actions</th></tr></thead><tbody>
    @foreach($equipment as $item)<tr>
        <td>{{ $item->equipment_name }}</td><td>{{ ucfirst($item->category) }}</td><td>₱{{ number_format((float) $item->unit_price,2) }}</td><td><span class="status {{ $item->availability_status }}">{{ ucfirst($item->availability_status) }}</span></td>
        <td class="nowrap"><a href="{{ route('equipment.show',$item) }}">View</a> · <a href="{{ route('equipment.edit',$item) }}">Edit</a></td>
    </tr>@endforeach
    </tbody></table></div>
    <div class="pagination">{{ $equipment->links() }}</div>
    @else<p>No equipment records match your filters. <a href="{{ route('equipment.create') }}">Add equipment</a> or reset the filters.</p>@endif
</div>
@endsection

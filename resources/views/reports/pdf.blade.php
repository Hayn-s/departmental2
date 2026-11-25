<!DOCTYPE html><html><head><meta charset="utf-8"><style>
body{font-family:DejaVu Sans,sans-serif;font-size:11px}h1{color:#173b73}
table{width:100%;border-collapse:collapse}th,td{border:1px solid #bbb;padding:7px;text-align:left}th{background:#edf2f8}
</style></head><body>
<h1>Pickleball Equipment Report</h1>
<p>Category: {{ $category ?: 'All' }} | Availability: {{ $status ?: 'All' }}</p>
@if($records->isEmpty())<p>No equipment records match the selected filters.</p>@else
<table><thead><tr><th>Equipment Name</th><th>Category</th><th>Unit Price</th><th>Status</th><th>Description</th></tr></thead><tbody>
@foreach($records as $item)<tr><td>{{ $item->equipment_name }}</td><td>{{ ucfirst($item->category) }}</td><td>{{ number_format($item->unit_price,2) }}</td><td>{{ ucfirst($item->availability_status) }}</td><td>{{ $item->description }}</td></tr>@endforeach
</tbody></table>@endif
</body></html>

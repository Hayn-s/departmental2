<label>Equipment Name</label>
<input name="equipment_name" value="{{ old('equipment_name', $equipment->equipment_name ?? '') }}" required>
@error('equipment_name')<div class="error">{{ $message }}</div>@enderror

<label>Category</label>
<select name="category" required><option value="">Select category</option>
@foreach(['paddles','balls','nets','accessories'] as $category)
<option value="{{ $category }}" @selected(old('category',$equipment->category ?? '') === $category)>{{ ucfirst($category) }}</option>
@endforeach</select>
@error('category')<div class="error">{{ $message }}</div>@enderror

<label>Unit Price (₱)</label>
<input type="number" name="unit_price" min="0" step="0.01" value="{{ old('unit_price',$equipment->unit_price ?? '') }}" required>
@error('unit_price')<div class="error">{{ $message }}</div>@enderror

<label>Description</label>
<textarea name="description" required>{{ old('description',$equipment->description ?? '') }}</textarea>
@error('description')<div class="error">{{ $message }}</div>@enderror

<label>Availability Status</label>
<select name="availability_status" required>
<option value="">Select status</option>
@foreach(['available','unavailable'] as $status)
<option value="{{ $status }}" @selected(old('availability_status',$equipment->availability_status ?? '') === $status)>{{ ucfirst($status) }}</option>
@endforeach
</select>
@error('availability_status')<div class="error">{{ $message }}</div>@enderror
<div class="actions"><button type="submit">Save Equipment</button><a class="btn secondary" href="{{ route('equipment.index') }}">Cancel</a></div>

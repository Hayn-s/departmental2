<?php
namespace App\Http\Controllers;
use App\Http\Requests\EquipmentRequest;
use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class EquipmentController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->validate([
            'category' => ['nullable', Rule::in(Equipment::CATEGORIES)],
            'availability_status' => ['nullable', Rule::in(Equipment::STATUSES)],
        ]);
        $query = $request->user()->equipment();
        if (!empty($filters['category'])) $query->where('category', $filters['category']);
        if (!empty($filters['availability_status'])) $query->where('availability_status', $filters['availability_status']);
        $equipment = $query->latest()->paginate(10)->withQueryString();
        return view('equipment.index', ['equipment' => $equipment, 'category' => $filters['category'] ?? '', 'status' => $filters['availability_status'] ?? '']);
    }
    public function create() { return view('equipment.create'); }
    public function store(EquipmentRequest $request)
    {
        $equipment = $request->user()->equipment()->create($request->validated());
        return redirect()->route('equipment.show', $equipment)->with('success', 'Equipment added successfully.');
    }
    public function show(Equipment $equipment)
    {
        $this->checkOwner($equipment);
        return view('equipment.show', compact('equipment'));
    }
    public function edit(Equipment $equipment)
    {
        $this->checkOwner($equipment);
        return view('equipment.edit', compact('equipment'));
    }
    public function update(EquipmentRequest $request, Equipment $equipment)
    {
        $this->checkOwner($equipment);
        $equipment->update($request->validated());
        return redirect()->route('equipment.show', $equipment)->with('success', 'Equipment updated successfully.');
    }
    public function destroy(Equipment $equipment)
    {
        $this->checkOwner($equipment);
        $equipment->delete();
        return redirect()->route('equipment.index')->with('success', 'Equipment deleted successfully.');
    }
    private function checkOwner(Equipment $equipment): void
    {
        abort_unless((int) $equipment->user_id === (int) auth()->id(), 403);
    }
}

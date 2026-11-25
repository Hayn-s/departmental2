<?php

namespace App\Http\Controllers;

use App\Exports\EquipmentExport;
use App\Models\Equipment;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    private function reportData(Request $request): array
    {
        $filters = $request->validate([
            'category' => ['nullable', Rule::in(Equipment::CATEGORIES)],
            'availability_status' => ['nullable', Rule::in(Equipment::STATUSES)],
        ]);

        $query = $request->user()->equipment();
        if (!empty($filters['category'])) {
            $query->where('category', $filters['category']);
        }
        if (!empty($filters['availability_status'])) {
            $query->where('availability_status', $filters['availability_status']);
        }

        $records = $query->orderBy('category')->orderBy('equipment_name')->get();

        return [
            'records' => $records,
            'category' => $filters['category'] ?? '',
            'status' => $filters['availability_status'] ?? '',
            'categories' => Equipment::CATEGORIES,
            'statuses' => Equipment::STATUSES,
        ];
    }

    public function index(Request $request)
    {
        return view('reports.index', $this->reportData($request));
    }

    public function pdf(Request $request)
    {
        return Pdf::loadView('reports.pdf', $this->reportData($request))
            ->download('pickleball-equipment-report.pdf');
    }

    public function excel(Request $request)
    {
        return Excel::download(
            new EquipmentExport($this->reportData($request)['records']),
            'pickleball-equipment-report.xlsx'
        );
    }
}

<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EquipmentExport implements FromCollection, WithHeadings
{
    public function __construct(private Collection $records) {}

    public function collection(): Collection
    {
        return $this->records->map(fn ($item) => [
            $item->equipment_name,
            ucfirst($item->category),
            number_format((float) $item->unit_price, 2, '.', ''),
            ucfirst($item->availability_status),
            $item->description,
        ]);
    }

    public function headings(): array
    {
        return ['Equipment Name', 'Category', 'Unit Price', 'Availability Status', 'Description'];
    }
}

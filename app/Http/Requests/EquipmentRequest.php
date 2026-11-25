<?php

namespace App\Http\Requests;

use App\Models\Equipment;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EquipmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'category' => is_string($this->category) ? strtolower(trim($this->category)) : $this->category,
            'availability_status' => is_string($this->availability_status)
                ? strtolower(trim($this->availability_status))
                : $this->availability_status,
        ]);
    }

    public function rules(): array
    {
        return [
            'equipment_name' => ['required', 'string', 'max:255'],
            'category' => ['required', Rule::in(Equipment::CATEGORIES)],
            'unit_price' => ['required', 'numeric', 'min:0', 'max:99999999.99'],
            'description' => ['required', 'string', 'max:5000'],
            'availability_status' => ['required', Rule::in(Equipment::STATUSES)],
        ];
    }
}

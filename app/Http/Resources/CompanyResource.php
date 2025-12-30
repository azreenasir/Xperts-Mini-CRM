<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'logo_url' => $this->logo_path ? Storage::url($this->logo_path) : null,
            'website' => $this->website,
            'employee_count' => $this->employees_count ?? $this->employees?->count(),
            'employees' => EmployeeResource::collection($this->whenLoaded('employees')),
        ];
    }
}

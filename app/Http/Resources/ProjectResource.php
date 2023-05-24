<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            'Name' => $this->name,
            'Detail' => $this->detail,
            'TotalCast' => $this->totalCost,
            // l,Fm,Y
            // l,Fd,Y
            'Deadline' => Carbon::parse($this->deadline)->format('l,F d,Y')
        ];
    }
}

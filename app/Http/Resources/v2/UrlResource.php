<?php

namespace App\Http\Resources\v2;

use Illuminate\Http\Request;
use App\Http\Resources\v2\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UrlResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user' => UserResource::make($this->user),
            'long_url' => $this->long_url,
            'short_url' => $this->short_url,
            'total_visit' => $this->total_visit,
        ];
    }
}

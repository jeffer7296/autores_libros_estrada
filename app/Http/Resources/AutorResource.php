<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AutorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
    return [
        'id' => $this->id,
        'nombres' => $this->nombres,
        'nacionalidad' => $this->nacionalidad,
        'email' => $this->email,
        'libros' => LibroResource::collection($this->whenLoaded('libros')),
    ];
    }

}

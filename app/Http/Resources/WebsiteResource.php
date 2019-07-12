<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WebsiteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'object' => 'website',
            'id' => $this->id,
            'url' => $this->url,
            'title' => $this->title,
            'description' => $this->description
        ];

    }
}

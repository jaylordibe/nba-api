<?php


namespace App\Http\Resources;


use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource {

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request) {
        return [
            'id' => $this->id,
            'status' => $this->status,
            'createdAt' => $this->created_at ? $this->created_at->getTimestamp() : null,
            'name' => $this->name,
            'conference' => $this->conference,
            'division' => $this->division
        ];
    }
}

<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class SettingsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name_ar,
            'description' => $this->description_ar,
            'terms' => $this->terms_ar,
            'privacy' => $this->privacy_ar,
            'email' => $this->email,
            'phone' => $this->phone,
            'video_url' => $this->video_url,
            'privacy_url' => env('APP_URL').'/privacy-policy'
        ];
    }
}

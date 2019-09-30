<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Article extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    // add additional stuff with response
    public function with($request) {
        return [
            'version' => '1.0',
            'auth_url' => url('http://ronishshrestha.com.np')
        ];
    }
}

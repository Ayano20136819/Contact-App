<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' =>$this->id,
            'title'=>$this->title,
            'given_name' => $this ->given_name,
            'family_name' => $this ->family_name,
            'full_name' => $this -> fullname,
            'nick_name' => $this ->nick_name,
            // no created at / updated at
        ];
    }
}

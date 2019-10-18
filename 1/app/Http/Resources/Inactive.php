<?php
 
namespace App\Http\Resources;
 
use Illuminate\Http\Resources\Json\Resource;
 
class Inactive extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'inactive_name' => $this->name,
            'inactive_email' => $this->email,
            'inactive_status' => $this->status
        ];
    }
}
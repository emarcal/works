<?php
 
namespace App\Http\Resources;
 
use Illuminate\Http\Resources\Json\Resource;
 
class User extends Resource
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
            'user_name' => $this->name,
            'user_email' => $this->email,
            'user_status' => $this->status
        ];
    }
}
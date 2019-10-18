<?php
 
namespace App\Http\Resources;
 
use Illuminate\Http\Resources\Json\Resource;
 
class History extends Resource
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
            'history_description' => $this->description,
            'history_causer' => $this->causer_id,
            'history_date' => $this->created_at
        ];
    }
}
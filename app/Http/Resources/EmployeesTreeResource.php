<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeesTreeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'text' => $this->id." ". $this->full_name . ' (' . $this->position->name . ') '. " depth:" .$this->depth." have children: ".$this->children_exist,
            "opened" => false,
            "loading"=> false,
            "icon" => "fa fa-user",
            'children_exist'=>(bool)$this->children_exist,
            'children' =>((bool)$this->children_exist) ? $this->children() : null,
            'isLeaf'=>false
        ];
    }


    public function children()
    {
        return [
            [
                "text"=> "Loading...",
                "value"=> "Loading...",
                "icon"=> "",
                "opened"=> false,
                "selected"=> false,
                "disabled"=> true,
                "loading"=> true,
            ]
        ];
    }
}
